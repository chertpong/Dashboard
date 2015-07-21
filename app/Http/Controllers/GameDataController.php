<?php

namespace App\Http\Controllers;

use App\GameData;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class GameDataController extends Controller
{
    public function create(Request $request){
        $gameData = new GameData();
        //Data from request
        $gameData->name = $request->get('name','');
        $gameData->numPass = $request->get('numPass','');
        $gameData->numLive = $request->get('numLive',0);
        $gameData->allDegreeAngle = $request->get('allDegreeAngle',0);
        $gameData->distanceHead = $request->get('distanceHead',0);
        $gameData->degreeSed = $request->get('degreeSed',0);
        $gameData->averageVelocity = $request->get('averageVelocity',0);
        $gameData->tomatoesWasted = $request->get('tomatoesWasted',0);
        $gameData->tomatoesAvoided = $request->get('tomatoesAvoided',0);
        $gameData->rightAvoid = $request->get('rightAvoid',0);
        $gameData->leftAvoid = $request->get('leftAvoid',0);
        $gameData->downAvoid = $request->get('downAvoid',0);
        $gameData->degreeTiltRight = $request->get('degreeTiltRight',0);
        $gameData->degreeTiltLeft = $request->get('degreeTiltLeft',0);
        $gameData->distanceHeadMoved = $request->get('distanceHeadMoved',0);
        $gameData->averageVelocityHeadMoved = $request->get('averageVelocityHeadMoved',0);
        $gameData->hash = $request->get('hash',0);
        //Random data
        $gameData->score = rand(0,1200000);
        $gameData->avoid = (rand(0,1000))/10.0;
        $gameData->speed = (rand(0,1000))/10.0;
        $gameData->time = (rand(0,1000))/10.0;
        $gameData->distance = (rand(0,1000))/10.0;
        $gameData->calories = (rand(0,1000))/10.0;
        $gameData->create_date = (Carbon::now());

        $gameData->save();
        return new Response("success",200);
    }
}
