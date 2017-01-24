<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
    	$data=[
	    	[
	    		'link_name'=>'facebook',
	    		'link_title'=>'Facebook',
	    		'link_url'=>'www.facebook.com',
	    		'link_order'=>'1',
	    	],
	    	[
	    		'link_name'=>'google',
	    		'link_title'=>'估狗',
	    		'link_url'=>'www.google.com',
	    		'link_order'=>'2',
	    	]
    	];
		DB::table('links')->insert($data);
    }
}
