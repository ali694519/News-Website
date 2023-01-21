<?php

namespace App\Models;

use App\Models\post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class category extends Model
{
    use HasFactory;

    protected $fillable = [
        'cate_name',
        'description',
        'created_by'
    ];

    // Relationships get the posts from category
    public function posts() {
        return $this->hasMany('App\Models\post','category_id');
    }



}
