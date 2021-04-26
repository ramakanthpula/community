<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Floor extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'floors';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'floor_name',
        'block_name_id',
        'no_of_units',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function block_name()
    {
        return $this->belongsTo(Block::class, 'block_name_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
