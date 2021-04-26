<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HelpDesk extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'help_desks';

    protected $dates = [
        'timestamp',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'mobile',
        'flat_no',
        'timestamp',
        'details',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getTimestampAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setTimestampAttribute($value)
    {
        $this->attributes['timestamp'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function enquiry_types()
    {
        return $this->belongsToMany(EnquiryCategory::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
