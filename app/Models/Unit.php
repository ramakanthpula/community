<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_SELECT = [
        'Vacant'     => 'Vacant',
        'Occupied'   => 'Occupied',
        'Rented Out' => 'Rented Out',
    ];

    public $table = 'units';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'block_name_id',
        'floor_name_id',
        'no_of_units',
        'unit_names',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function block_name()
    {
        return $this->belongsTo(Block::class, 'block_name_id');
    }

    public function floor_name()
    {
        return $this->belongsTo(Floor::class, 'floor_name_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
