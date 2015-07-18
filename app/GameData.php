<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameData extends Model
{
    protected $table = 'game_data';
    public $timestamps = false;
    protected $dates = ['create_date'];
}
