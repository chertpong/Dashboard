<?php

use Illuminate\Database\Seeder;

class GameDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Now we need specific data
        //factory('App\GameData',50)->create();
        //So I manually create it
        factory(App\GameData::class,10)->create();

    }
}
