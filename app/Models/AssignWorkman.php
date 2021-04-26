<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssignWorkman extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const WEEKLY_OFF_RADIO = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    public const UNIT_ASSIGNMENT_RADIO = [
        'Unit'      => 'Unit',
        'Community' => 'Community',
    ];

    public const GATE_PASS_STATUS_SELECT = [
        'Active'   => 'Active',
        'InActive' => 'InActive',
    ];

    public $table = 'assign_workmen';

    protected $dates = [
        'contract_effective_date',
        'from_date',
        'to_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'unit_assignment',
        'working_area',
        'weekly_off',
        'contract_effective_date',
        'from_date',
        'to_date',
        'gate_pass_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getContractEffectiveDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setContractEffectiveDateAttribute($value)
    {
        $this->attributes['contract_effective_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFromDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFromDateAttribute($value)
    {
        $this->attributes['from_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getToDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setToDateAttribute($value)
    {
        $this->attributes['to_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
