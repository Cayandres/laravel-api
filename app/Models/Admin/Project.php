<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\Admin\Tag;


class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
        'creation_date',
        'slug',
        'image_original_name',
        'image_path'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
     }

     public function tags(){
        return $this->belongsToMany(Tag::class);
     }
}
