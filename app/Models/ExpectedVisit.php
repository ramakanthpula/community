<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpectedVisit extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const VEHICLE_TYPE_RADIO = [
        'Car'  => 'Car',
        'Bike' => 'Bike',
    ];

    public const CHECK_IN_BY_RADIO = [
        'Walk-In' => 'Walk-In',
        'Vehicle' => 'Vehicle',
    ];

    public const VISITING_TYPE_RADIO = [
        'Single'   => 'Single',
        'Multiple' => 'Multiple',
    ];

    public const CHECK_IN_TYPE_RADIO = [
        'Individual' => 'Individual',
        'Group'      => 'Group',
    ];

    public const GENDER_SELECT = [
        'Male'   => 'Male',
        'Female' => 'Female',
        'Others' => 'Others',
    ];

    public const VISIT_TYPE_RADIO = [
        'Invitation'       => 'Invitation',
        'Pre-Registration' => 'Pre-Registration',
    ];

    public $table = 'expected_visits';

    protected $dates = [
        'expected_in_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'visit_type',
        'unit_no_id',
        'name',
        'no_of_persons',
        'gender',
        'address',
        'check_in_type',
        'visiting_type',
        'check_in_by',
        'vehicle_type',
        'expected_in_date',
        'expected_in_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function unit_no()
    {
        return $this->belongsTo(AllotUnit::class, 'unit_no_id');
    }

    public function getExpectedInDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setExpectedInDateAttribute($value)
    {
        $this->attributes['expected_in_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function purposes()
    {
        return $this->belongsToMany(PurposeOfVisit::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
