<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $fillable = ['content', 'user_id', 'category_id', 'picture', 'date', 'title'];

    use HasFactory;

    public static function rules()
    {
        return [
            'content' => 'required',
            'category_id' => 'required',
            'picture' => 'required',
            'title' => 'required',
        ];
    }

    public static function feedback()
    {
        return [
            'required' => 'Por favor preencha esse campo',
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
