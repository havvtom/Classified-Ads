<?php

namespace App\Traits\Eloquent;

trait PivotOrderableTrait{

	public function scopeOrderByPivot($query, $column='created_at', $order='DESC')
	{
		return $query->orderBy('pivot_'.$column, $order);
	}
}