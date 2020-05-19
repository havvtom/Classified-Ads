<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Area;
use App\Listing;

class ListingPaymentController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth']);
	}

    public function show(Area $area, Listing $listing)
    {
    	$this->authorize('update', $listing);
    	
    	if($listing->live()){

    		return back();
    	}

    	return view('listings.payment.show', compact('listing'));
    }

    public function store(Request $request, Area $area, Listing $listing)
    {
    	$this->authorize('listing', $listing);
    	//check if listing is live
    }

    public function update(Request $request, Area $area, Listing $listing)
    {
    	$this->authorize('update', $listing);
    	
    	if($listing->cost() > 0){
    		return;
    	}

    	$listing->live = true;
    	$listing->created_at = \Carbon\Carbon::now();
    	$listing->save();

    	return redirect()
    			->route('listing.show', [$area, $listing])
    			->withSuccess('Congratulations !!! Your listing is now live');
    }
}
