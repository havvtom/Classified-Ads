<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $categories = [
        		    ['name' => 'Community',        
        		    'children' => [

        		            ['name' => 'Activities'],
        		            ['name' => 'Artists'],
        		            ['name' => 'Childcare'],
        		            ['name' => 'Classes'],
        		            ['name' => 'Events'],
        		            ['name' => 'General'],
        		            ['name' => 'Groups'],
        		            ['name' => 'Local News'],
        		            ['name' => 'Lost & Found'],
        		            ['name' => 'Musicians'],
        		            ['name' => 'Pets'],
        		            ['name' => 'Politics'],
        		            ['name' => 'Ride Share'],
        		            ['name' => 'Volunteers']
        		    ]
        		],
                    [
                    'name' => 'Personals',

                    'children' => [
                        
                        [ 'name' => 'Strictly Platonic'],
                        [ 'name' => 'Men Seeking Women'],
                        [ 'name' => 'Women Seeking Men'],
                        [ 'name' => 'Women Seeking Women'],
                        [ 'name' => 'Misc Romance'],
                        [ 'name' => 'Casual Encounters'],
                        [ 'name' => 'Missed Connections'],
                        [ 'name' => 'Rants and Raves'],

                        ],                             
                    ],
                    ['name' => 'Housing',
        
        		    'children' => [
        		        
        		            ['name' => 'Apartments / Housing'],
        		            ['name' => 'Housing Swaps'],
        		            ['name' => 'Housing Wanted'],
        		            ['name' => 'Office / Commercial'],
        		            ['name' => 'Parking / Storage'],
        		            ['name' => 'Real Eastate for sale'],
        		            ['name' => 'Rooms / Shared'],
        		            ['name' => 'Rooms wanted'],
        		            ['name' => 'Sublets / Temporary'],
        		            ['name' => 'VacationRentals']
        		        
        		    ]
        		]
        	];

        foreach($categories as $category){
        	Category::create($category);
        }
    }
}
