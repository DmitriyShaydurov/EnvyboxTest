<?php

namespace App;

class PlacesToSave
{
    public static function createPlace($place)
    {
        return (class_exists($place)) ? new $place : false;
    } 

}