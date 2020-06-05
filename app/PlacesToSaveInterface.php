<?php

namespace App;

/**
 * @property string $name
 * @property string $phone
 * @property string $message
 * 
 */
interface PlacesToSaveInterface
{
    public function save();

}