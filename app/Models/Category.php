<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable=['name'];
    protected $table = 'categories';
    use HasFactory;

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
}
