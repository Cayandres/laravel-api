<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Project;

class Tag extends Model
{
    use HasFactory;

    public function projects(){
        return $this->belongsToMany(Project::class);
     }
}
