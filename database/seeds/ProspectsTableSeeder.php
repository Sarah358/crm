<?php

use Illuminate\Database\Seeder;
use App\Prospect;

class ProspectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // running the factory
       factory(Prospect::class,50)->create();


        


    }
}
