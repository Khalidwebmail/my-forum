<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($category) {
            $category->slug = \Str::slug($category->name);
        });
    }

    protected $fillable = ['name', 'slug'];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
