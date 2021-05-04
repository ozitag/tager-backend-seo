<?php

namespace OZiTAG\Tager\Backend\Seo\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ozerich\FileStorage\Models\File;

/**
 * Class TagerSeoTemplate
 * @package OZiTAG\Tager\Backend\Seo\Models
 *
 * @property string $template
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $open_graph_image_id
 *
 * @property File $openGraphImage
 */
class TagerSeoTemplate extends Model
{
    public $timestamps = false;

    protected $table = 'tager_seo_templates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'template',
        'title', 'description', 'keywords',
        'open_graph_image_id'
    ];

    public function openGraphImage()
    {
        return $this->belongsTo(File::class, 'open_graph_image_id');
    }
}
