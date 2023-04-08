<?php

namespace App\Controller;

use App\Config\DB;
use App\Model\User;
use mysqli_stmt;

class AdminController
{
    public function admin(): void{
        $results = mysqli_query(DB::mysqli(), "SELECT * FROM `user` ORDER BY point DESC LIMIT 3");

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

        require "../templates/admin.php";
    }
}
