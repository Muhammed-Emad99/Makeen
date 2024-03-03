<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title_ar' , 'title_en'];

    public function services()
    {
        return $this->hasMany(Service::class, 'category_id');
    }

    public function getTitleAttribute()
    {
        return $this['title_' . app()->getLocale()];
    }
}
