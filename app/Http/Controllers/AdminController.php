<?php

namespace App\Http\Controllers;


class AdminController extends Controller
{
    public function __construct() {
    }

    public function insertData(){
        $filename = $_FILES["uploadedfoto"]["name"];
        $filetmp = $_FILES["uploadedfoto"]["tmp_name"];
        $filetype = $_FILES["uploadedfoto"]["type"];

        echo $filename."<br>";
        echo $filetmp."<br>";
        echo $filetype."<br>";
        $url = "../resources/assets/".$filename;

        move_uploaded_file($filetmp,$url);

//        $path = $url;
//        $type = pathinfo($path, PATHINFO_EXTENSION);
//        $data = file_get_contents($path);
//        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $PDO = new \PDO("mysql:host=localhost", "root", "");
        $PDO->query("USE lumenapi;");
        $test = "test";


        $query = $PDO->prepare("INSERT INTO woorden (woord-nl,woord-az,img)VALUES (:woord-nl, :woord-az, :img);");
        $query->bindParam(":woord-nl",$_POST["woord-nl"]);
        $query->bindParam(":woord-az",$_POST["woord-az"]);
        $query->bindParam(":img",$test);

        $query->execute();
        var_dump($query);

    }

}
