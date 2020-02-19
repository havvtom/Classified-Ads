<?php

use Illuminate\Database\Seeder;
use \App\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = Area::create([
        		    'name' => 'South Africa',
        
        		    'children' => [
        		        [
        		            'name' => 'Johannesburg',
        
        		            'children' => [
        		                [ 'name' => 'Sandton' ],
        		                [ 'name' => 'Ranburg' ],
        		                [ 'name' => 'Fourways' ],
        		            ],
        		        ],
        		        [
        		            'name' => 'Cape Town',
        
        		            'children' => [
        		                [ 'name' => 'Waterfront' ],
        		                [ 'name' => 'Greenpoint' ],
        		                [ 'name' => 'Campsbay' ],
        		            ],
        		        ],
        		    ],
        		]);
    }
}
