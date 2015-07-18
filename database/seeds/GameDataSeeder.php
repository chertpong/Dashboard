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
        $data = new App\GameData();
        for($index = 0; $index<7;$index++){
            $date = Faker\Factory::create()->dateTimeThisMonth('now');
            for($i =0; $i<6; $i++){
                $data->data = Faker\Factory::create()->randomFloat(2,1,100);
                $data->type = $i;
                $data->create_date = $date;
                $data->save();
                $data = new App\GameData();
            }
        }

    }
}
