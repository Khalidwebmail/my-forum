<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     *
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($question) {
            $question->slug = \Str::slug($question->title);
        });
    }
    protected $fillable = ['title','slug','body','user_id','category_id'];

    /**
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get user info
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get replies of single question
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(Reply::class)->latest();
    }

    /**
     * Get the category of question
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return string
     */
    public function getPathAttribute()
    {
        return "/question/$this->slug";
    }
}
