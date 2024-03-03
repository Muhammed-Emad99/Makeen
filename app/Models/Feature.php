<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [ 'description_ar', 'description_en', 'icon'];

    public function getDescriptionAttribute()
    {
        return $this['description_' . app()->getLocale()];
    }
}
