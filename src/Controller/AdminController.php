<?php

namespace App\Controller;

use App\Model\User;
use mysqli_stmt;

class AdminController
{
    public function amdmin(): void{
        $mysqli = mysqli_connect("127.0.0.1","root",null,"mcdonalds_trival_game");

        $results = mysqli_query($mysqli, "SELECT * FROM `user` ORDER BY point DESC LIMIT 3");

        /**
         * @var User[] $users
         */
        $users = [];

        while ($row = $results->fetch_row()) {
            $u = new User();

            $u->setName($row[1]);
            $u->setNumber($row[2]);

            $users[] = $u;
        }

        require "templates/admin.php";
    }
}
