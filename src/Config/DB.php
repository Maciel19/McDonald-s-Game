<?php

namespace App\Config;

use mysqli;

class DB {
    public static function mysqli(): false|mysqli|null {
        return mysqli_connect("127.0.0.1","maciel","mcdonalds","mcdonalds_trival_game");
    }
}