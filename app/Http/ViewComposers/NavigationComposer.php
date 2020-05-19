<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Listing;

class NavigationComposer
{
	public function compose(View $view)
	{
		if(!auth()->check()){
			return $view;
		}

		$user = auth()->user();
		$listings = $user->listings;

		return $view->with([
			'unpublishedListingsCount' => $listings->where('live', false)->count(),
			'publishedListingsCount' => $listings->where('live', true)->count()
		]);
	}
}