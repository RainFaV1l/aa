<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'preview_path',
        'price',
        'project_category_id',
        'service_id',
        'visibility',
        'completed_at',
    ];

    public function service(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProjectCategory::class);
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\hasMany
    {
        return $this->hasMany(ProjectImage::class);
    }
}
