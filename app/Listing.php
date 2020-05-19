<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Area;
use App\Category;
use App\Traits\Eloquent\OrderableTrait;
use App\Traits\Eloquent\PivotOrderableTrait;
use Laravel\Scout\Searchable;


class Listing extends Model
{
	use SoftDeletes;
	use OrderableTrait, PivotOrderableTrait;
    use Searchable;

    protected $guarded = [];

    public function favorites()
    {
        return $this->morphToMany(User::class, 'favoriteable');
    }

    public function isFavoritedBy(User $user)
    {
        return $this->favorites->contains($user);
    }

    public function live()
    {
    	return $this->live;
    }

    public function scopeIsLive($query)
    {
    	return $query->where('live', true);
    }

    public function scopeIsNotLive($query)
    {
    	return $query->where('live', false);
    }

    public function scopeFromCategory($query, Category $category)
    {
    	return $query->where('category_id', $category->id);
    }

    public function scopeInArea($query, Area $area)
    {
    	return $query->whereIn('area_id', array_merge(
    		[$area->id],
    		$area->descendants->pluck('id')->toArray()
    	));
    }

    public function cost()
    {
    	return $this->category->price;
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function area()
    {
    	return $this->belongsTo(Area::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function viewedUsers()
    {
        return $this->belongsToMany(User::class, 'user_listing_views', 'listing_id', 'user_id')
                        ->withTimestamps()
                        ->withPivot(['count']);
    }

    public function views()
    {
        // return array_sum($this->viewedUsers->pluck('pivot.count')->toArray());

        return $this->viewedUsers()->sum('count');
    }

    public function ownedByUser(User $user)
    {
        return $this->user->id == $user->id;
    }

    public function toSearchableArray()
    {
        $properties = $this->toArray();

        $properties['created_at'] = $this->created_at->diffForHumans();

        $properties['user'] = $this->user;

        $properties['category'] = $this->category;

        $properties['area'] = $this->area;

        return $properties;
    }
}
