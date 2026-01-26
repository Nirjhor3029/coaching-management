<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeachersPayment extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'teachers_payments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const PAYMENT_STATUS_SELECT = [
        'due'         => 'Due',
        'pending'     => 'Pending',
        'proccessing' => 'Proccessing',
        'paid'        => 'Paid',
    ];

    protected $fillable = [
        'teacher_id',
        'payment_details',
        'month',
        'year',
        'payment_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
