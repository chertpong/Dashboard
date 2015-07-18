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
        $gameData = GameData::all();
        return view('dashboard.index',['gameData'=>$gameData,'dropdownMenuData'=>$gameData]);
    }
    public function getByDate($date){
        $gameData = GameData::whereDate('create_date','=',$date)->get();
        return view('dashboard.index',['gameData'=>$gameData,'dropdownMenuData'=>GameData::all()]);
    }
}