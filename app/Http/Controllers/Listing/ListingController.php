<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Area;
use App\Category;
use App\Listing;
use App\Http\Requests\StoreListingFormRequest;
use App\Jobs\UserViewedListing;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['index, show']);
    }

    public function index(Area $area, Category $category)
    {
    	$listings = Listing::with(['area', 'user'])->fromCategory($category)->inArea($area)->isLive()->latestFirst()->paginate(10);
    	
    	return view('listings.index', compact('listings', 'category'));
    }

    public function show(Request $request, Area $area, Listing $listing)
    {
    	if(!$listing->isLive()){
    		abort(404);
    	}

        if($request->user()){
            dispatch(new UserViewedListing($request->user(), $listing));
        }

    	return view('listings.show', compact('listing'));
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(StoreListingFormRequest $request, Area $area)
    {
        $listing = new Listing;
        $listing->title = $request->title;
        $listing->body = $request->body;
        $listing->category_id = $request->category_id;
        $listing->area_id = $request->area_id;
        $listing->user()->associate($request->user());

        $listing->save();

        return redirect()->route('listing.edit', [$area, $listing]);
    }

    public function edit(Request $request, Area $area, Listing $listing)
    {
        $this->authorize('update', $listing);

        return view('listings.edit', compact('listing'));
    }

    public function update(StoreListingFormRequest $request, Area $area, Listing $listing)
    {
        $this->authorize('update', $listing);

        $listing->title = $request->title;
        $listing->body = $request->body;

        if(!$listing->live()){
            $listing->category_id = $request->category_id;
        }

        $listing->area_id = $request->area_id;

        $listing->save();

        if($request->has('payment')){
            return redirect()->route('listing.payment.show', [$area, $listing]);
        }

        return back()->withSuccess('Listing edited successfully');
    }

    public function destroy(Request $request, Area $area, Listing $listing)
    {
        $this->authorize('update', $listing);

        $listing->delete();

        return back()->withSuccess('Your listing has been successfully deleted.');
    }
}
