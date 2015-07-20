<?php

namespace App\Http\Controllers;

use App\GameData;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GameDataController extends Controller
{
    public function create(Request $request){
        $gameData = new GameData();
        //Data from request
        $gameData->name = $request->get('name');
        $gameData->numPass = $request->get('numPass');
        $gameData->numLive = $request->get('numLive');
        $gameData->allDegreeAngle = $request->get('allDegreeAngle');
        $gameData->distanceHead = $request->get('distanceHead');
        $gameData->degreeSed = $request->get('degreeSed');
        $gameData->averageVelocity = $request->get('averageVelocity');
        $gameData->hash = $request->get('hash');
        //Random data
        $gameData->score = rand(0,1200000);
        $gameData->avoid = (rand(0,1000))/10.0;
        $gameData->speed = (rand(0,1000))/10.0;
        $gameData->time = (rand(0,1000))/10.0;
        $gameData->distance = (rand(0,1000))/10.0;
        $gameData->calories = (rand(0,1000))/10.0;
        $gameData->create_date = (Carbon::now());
        $gameData->tomatoesWasted = (rand(0,1000))/10.0;
        $gameData->tomatoesAvoided = (rand(0,1000))/10.0;
        $gameData->rightAvoid = (rand(0,1000))/10.0;
        $gameData->leftAvoid = (rand(0,1000))/10.0;
        $gameData->downAvoid = (rand(0,1000))/10.0;
        $gameData->degreeTiltRight = (rand(0,1000))/10.0;
        $gameData->degreeTiltLeft = (rand(0,1000))/10.0;
        $gameData->distanceHeadMoved = (rand(0,1000))/10.0;
        $gameData->averageVelocityHeadMoved = (rand(0,1000))/10.0;
        $gameData->save();
        return 'success';
    }
}
