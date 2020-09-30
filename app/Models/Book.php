<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'books';
    protected $fillable = ['name', 'author', 'category_id', 'publication_date', 'user_id'];
    public $timestamps = true;
    protected $dates = ['deleted_at'];

    public function category()
	{
		return $this->belongsTo('App\Models\Category');
    }

    public function user()
	{
		return $this->belongsTo('App\Models\User');
    }

}
