<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visitor extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const CHECK_IN_TYPE_RADIO = [
        'Individual' => 'Individual',
        'Group'      => 'Group',
    ];

    public const GENDER_SELECT = [
        'Male'   => 'Male',
        'Female' => 'Female',
        'Others' => 'Others',
    ];

    public $table = 'visitors';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'check_in_type',
        'name',
        'gender',
        'address',
        'company',
        'unit_no_id',
        'photo',
        'in_time',
        'out_time',
        'whom_to_meet',
        'purpose_of_visit',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function unit_no()
    {
        return $this->belongsTo(AllotUnit::class, 'unit_no_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
