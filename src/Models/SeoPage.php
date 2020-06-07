<?php

namespace OZiTAG\Tager\Backend\Seo\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ozerich\FileStorage\Models\File;

class SeoPage extends Model
{
    use SoftDeletes;

    protected $table = 'tager_seo_pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'page', 'title', 'description',
        'open_graph_title', 'open_graph_description', 'open_graph_image_id'
    ];

    public function openGraphImage()
    {
        return $this->belongsTo(File::class, 'open_graph_image_id');
    }
}
