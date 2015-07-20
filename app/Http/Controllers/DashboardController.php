<?php
/**
 * Created by PhpStorm.
 * User: Chertpong
 * Date: 7/18/2015
 * Time: 10:29 PM
 */

namespace App\Http\Controllers;


use App\GameData;

class DashboardController extends Controller{

    function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $maxScore = 1200000;
        $gameData = GameData::all();
        $gameDataIsArray = true;
        return view('dashboard.index',['gameData'=>$gameData,'dropdownMenuData'=>$gameData,'maxScore'=>$maxScore,
            'gameDataIsArray'=>$gameDataIsArray]);
    }
    public function getByDate($date){
        $maxScore = 1200000;
        $gameData = GameData::whereDate('create_date','=',$date)->get();
        $gameDataIsArray = true;
        return view('dashboard.index',['gameData'=>$gameData,'dropdownMenuData'=>GameData::all(),'maxScore'=>$maxScore,
            'gameDataIsArray'=>$gameDataIsArray]);
    }
    public function getById($id){
        $maxScore = 1200000;
        $gameData = GameData::find($id);
        $gameDataIsArray = false;
        return view('dashboard.index',['gameData'=>$gameData,'dropdownMenuData'=>GameData::all(),'maxScore'=>$maxScore,
            'gameDataIsArray'=>$gameDataIsArray]);
    }
}