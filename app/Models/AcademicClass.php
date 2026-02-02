<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicClass extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'academic_classes';

    protected $dates = [
        'academic_year',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'class_name',
        'academic_year',
        'class_code',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function classStudentBasicInfos()
    {
        return $this->hasMany(StudentBasicInfo::class, 'class_id', 'id');
    }

    public function getAcademicYearAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAcademicYearAttribute($value)
    {
        $this->attributes['academic_year'] = $value ? Carbon::parse($value)->format('Y-m-d') : null;
    }

    public function class_sections()
    {
        return $this->belongsToMany(Section::class);
    }

    public function class_shifts()
    {
        return $this->belongsToMany(Shift::class);
    }
}
