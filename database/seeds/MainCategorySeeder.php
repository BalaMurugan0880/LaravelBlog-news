<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MainCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('maincategory')->insert([
            [
  
                'mainCategory' => 'News',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'mainCategory' => 'Blog',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
