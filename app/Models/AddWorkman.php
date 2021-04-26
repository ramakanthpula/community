<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddWorkman extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const GENDER_SELECT = [
        'Male'   => 'Male',
        'Female' => 'Female',
    ];

    public const CATEGORY_RADIO = [
        'Skilled'   => 'Skilled',
        'Unskilled' => 'Unskilled',
    ];

    public const BLOOD_GROUP_SELECT = [
        'A+'  => 'A+',
        'A-'  => 'A-',
        'B+'  => 'B+',
        'B-'  => 'B-',
        'AB+' => 'AB+',
        'AB-' => 'AB-',
        'O+'  => 'O+',
        'O-'  => 'O-',
    ];

    public $table = 'add_workmen';

    protected $dates = [
        'date_of_birth',
        'date_of_joining',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'date_of_birth',
        'category',
        'skilled_id',
        'address_line_1',
        'address_line_2',
        'city',
        'father_husband',
        'gender',
        'pin_code',
        'date_of_joining',
        'aadhaar_number',
        'blood_group',
        'photo',
        'vehicle_number',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function skilled()
    {
        return $this->belongsTo(SkilledWorker::class, 'skilled_id');
    }

    public function getDateOfJoiningAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfJoiningAttribute($value)
    {
        $this->attributes['date_of_joining'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
