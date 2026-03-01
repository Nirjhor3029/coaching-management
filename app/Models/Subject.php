<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'subjects';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'code',
        'monthly_fee',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function subjectEarnings()
    {
        return $this->hasMany(Earning::class, 'subject_id', 'id');
    }

    public function subjectTeachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function subjectStudentBasicInfos()
    {
        return $this->belongsToMany(StudentBasicInfo::class);
    }

    public function subjectBatches()
    {
        return $this->hasMany(Batch::class, 'subject_id', 'id');
    }

    public function batches()
    {
        return $this->belongsToMany(Batch::class);
    }
}
