<?php

namespace App\Controller;

use App\Config\DB;
use App\Model\User;

class MainController
{
    public function identifier(): void{
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $name = $_REQUEST ['Name'];

            $user = new User();
            $user->setName($name);

            $_SESSION['user'] = serialize($user);

            $this->game();
            exit();
        }

        require "../templates/User.html";
    }
    public function game(): void{
        require "../templates/game.php";
    }

    public function finish():void{
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $points = $_REQUEST ['points'];

            /**
             * @var User $user
             */
            $user = unserialize($_SESSION['user']);
            $user->setNumber($points);

            // TODO: Improve security
            mysqli_query(DB::mysqli(),"INSERT INTO user (name, point) VALUES ('" . $user->getName() . "', ". $user->getNumber() . ")");

            $_SESSION ['finish'] = true;
        }
    }
}

