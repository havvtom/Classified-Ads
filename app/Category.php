<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Support\Str;
use App\Listing;

class Category extends Model
{
    use NodeTrait;

	protected static function boot(){

        parent::boot();

        static::creating(function($category){

            $prefix = $category->parent ? $category->parent->name. ' ' : '';
            $category->slug = Str::slug($prefix.$category->name);
        });        
    }

    protected $guarded = [];

    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public function scopeWithListingsInArea($query, Area $area)
    {
        return $query->with(['listings' => function ($q) use ($area) {
            $q->isLive()->inArea($area);
        }]);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
