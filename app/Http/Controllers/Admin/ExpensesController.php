<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyExpenseRequest;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\Teacher;
use App\Models\User;
// use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ExpensesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('expense_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expenses = Expense::with(['expense_category', 'created_by', 'updated_by', 'teacher', 'media'])->get();

        return view('admin.expenses.index', compact('expenses'));
    }

    public function create()
    {
        abort_if(Gate::denies('expense_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expense_categories = ExpenseCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        // return $expense_categories;
        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $teachers = Teacher::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.expenses.create', compact('created_bies', 'expense_categories', 'teachers', 'updated_bies'));
    }

    public function store(StoreExpenseRequest $request)
    {
        $expense = Expense::create($request->all());

        foreach ($request->input('payment_proof', []) as $file) {
            $expense->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('payment_proof');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $expense->id]);
        }

        return redirect()->route('admin.expenses.index');
    }

    public function edit(Expense $expense)
    {
        abort_if(Gate::denies('expense_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expense_categories = ExpenseCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $teachers = Teacher::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $expense->load('expense_category', 'created_by', 'updated_by', 'teacher');

        return view('admin.expenses.edit', compact('created_bies', 'expense', 'expense_categories', 'teachers', 'updated_bies'));
    }

    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $expense->update($request->all());

        if (count($expense->payment_proof) > 0) {
            foreach ($expense->payment_proof as $media) {
                if (! in_array($media->file_name, $request->input('payment_proof', []))) {
                    $media->delete();
                }
            }
        }
        $media = $expense->payment_proof->pluck('file_name')->toArray();
        foreach ($request->input('payment_proof', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $expense->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('payment_proof');
            }
        }

        return redirect()->route('admin.expenses.index');
    }

    public function show(Expense $expense)
    {
        abort_if(Gate::denies('expense_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expense->load('expense_category', 'created_by', 'updated_by', 'teacher');

        return view('admin.expenses.show', compact('expense'));
    }

    public function destroy(Expense $expense)
    {
        abort_if(Gate::denies('expense_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expense->delete();

        return back();
    }

    public function massDestroy(MassDestroyExpenseRequest $request)
    {
        $expenses = Expense::find(request('ids'));

        foreach ($expenses as $expense) {
            $expense->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('expense_create') && Gate::denies('expense_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Expense();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
