<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Support\Str;

class Area extends Model
{
	use NodeTrait;

	protected static function boot(){

        parent::boot();

        static::creating(function($area){

            $prefix = $area->parent ? $area->parent->name. ' ' : '';
            $area->slug = Str::slug($prefix.$area->name);
        });        
    }

    protected $guarded = [];

    public function getRouteKeyName(){

    	return 'slug';
    }

    public function path()
    {
        return '/user/area/'.$this->slug;
    }
}
