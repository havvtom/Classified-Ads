<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Area;

class AreaComposer
{
	private $area;

	public function compose(View $view)
	{
		if(!$this->area){
			$this->area = Area::where('slug', session()->get('area', 'south-africa'))->first();	
		}
		
		$view->with('area', $this->area);
	}
}