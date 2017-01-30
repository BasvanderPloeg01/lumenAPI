<?php

namespace App\Http\Controllers;

class LoginController extends Controller {
    public function __construct() {

    }

    public function login() {
        $PDO = new \PDO("mysql:host=localhost", "root", "");
        $PDO->query("USE lumenapi;");
            $PDO = new \PDO("mysql:host=localhost", "root", "");
            $PDO->query("USE lumenapi;");


        $PDO = new \PDO("mysql:host=localhost", "root", "");
        $PDO->query("USE lumenapi;");
        $PDO = new \PDO("mysql:host=localhost", "root", "");
        $PDO->query("USE lumenapi;");

        $query = $PDO->prepare("SELECT * FROM users WHERE username = :username AND password = :password  ;");
        $query->bindParam(":username", $_POST["username"]);
        $query->bindParam(":password", $_POST["password"]);
        $query->execute();

        $array = $query->fetchAll();

        if(count($array) == 1) {
            echo "u bent ingelogd";
            session_start();
            $_SESSION["login"] = true;

        }
        else {
            echo "verkeerde gegevens";
        }
    }
}
