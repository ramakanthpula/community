<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DefectSubCategory extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'defect_sub_categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'defect_category_id',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function defect_category()
    {
        return $this->belongsTo(DefectCategory::class, 'defect_category_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
