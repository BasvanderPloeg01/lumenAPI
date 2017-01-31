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

        $path = $url;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $PDO = new \PDO("mysql:host=localhost", "root", "");
        $PDO->query("USE lumenapi;");



        $query = $PDO->prepare("INSERT INTO woorden (woordNL,woordAZ,img)VALUES (:woordNL, :woordAZ, :img);");
        $query->bindParam(":woordNL",$_POST["woord-nl"]);
        $query->bindParam(":woordAZ",$_POST["woord-az"]);
        $query->bindParam(":img",$base64);

          $query->execute();
        var_dump($query);

    }

}
