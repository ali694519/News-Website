<?php

namespace App\Models;

use App\Models\tag;
use App\Models\post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'category_id'
    ];
    public $timestamps = true;

    // Relationships get the category from post
    public function category()
    {
        return $this->belongsTo('App\Models\category', 'category_id');
    }

    // Relationships get the tags from post
    public function tags()
    {
        return $this->belongsToMany('App\Models\tag','tag_post_pivot','post_id','tag_id');
    }




}
