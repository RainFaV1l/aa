<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_description',
        'description',
        'preview_path',
        'price',
        'project_category_id',
        'service_id',
        'visibility',
        'completed_at',
        'link_to_site',
        'link_to_project',
    ];

    public function service(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\hasMany
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function technologies(): \Illuminate\Database\Eloquent\Relations\belongsToMany
    {
        return $this->belongsToMany(Technology::class, 'project_stacks', 'project_id', 'technology_id');
    }
}
