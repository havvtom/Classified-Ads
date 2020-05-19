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
        		            'name' => 'Gauteng',
        
        		            'children' => [

        		                [ 'name' => 'Johannesburg',

                                'children' =>[
                                    [ 'name' => 'Sandton'],
                                    [ 'name' => 'Fourways'],
                                    [ 'name' => 'Randburg'],
                                ]
                                 ],        		                
        		            ],
        		        ],
                        [
                            'name' => 'Kwazulu Natal',
        
                            'children' => [
                                
                                [ 'name' => 'Durban',

                                'children' =>[
                                    [ 'name' => 'Kwamashu'],
                                    [ 'name' => 'Umhlanga'],
                                    [ 'name' => 'Canelands'],
                                ]
                                 ],                             
                            ],
                        ], 
                        [
                            'name' => 'Western Cape',
        
                            'children' => [
                                
                                [ 'name' => 'Cape Town',

                                'children' =>[
                                    [ 'name' => 'Bellville'],
                                    [ 'name' => 'Campsbay'],
                                    [ 'name' => 'Seapoint'],
                                ]
                                 ],                             
                            ],
                        ],         		        
        		    ],
        		]);
    }
}
