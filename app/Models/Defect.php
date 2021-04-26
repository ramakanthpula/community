<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Defect extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'defects';

    protected $dates = [
        'incident_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'users_id',
        'name',
        'mobile',
        'email',
        'flat_no',
        'incident_date',
        'defect_type_id',
        'defect_sub_type_id',
        'incident_location',
        'defect_details',
        'problem_description',
        'convenient_time',
        'desired_outcome',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function getIncidentDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setIncidentDateAttribute($value)
    {
        $this->attributes['incident_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function defect_type()
    {
        return $this->belongsTo(DefectCategory::class, 'defect_type_id');
    }

    public function defect_sub_type()
    {
        return $this->belongsTo(DefectSubCategory::class, 'defect_sub_type_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
