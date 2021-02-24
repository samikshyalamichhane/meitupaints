<?php

use Illuminate\Database\Seeder;


class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->delete();
        $data = [
        	['title'=>'Privacy Policy','slug'=>Str::slug('privacy-policy'),'image'=>'','description'=>'','short_description'=>'','publish'=>'1','main'=>1],
            
        	
            
        	];
        \App\Models\Page::insert($data);
    }
}
