<?php

class Connection
{
    public function getConnection()
    {
        return new PDO("mysql:host=bulls;dbname=goldfiel_quiz2m","goldfiel_user","quiz2m",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }    
}

?>