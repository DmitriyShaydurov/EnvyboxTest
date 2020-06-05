<?php

namespace App;

use Illuminate\Support\Facades\Storage;
// use App\PlacesToSaveInterface;
include('PlacesToSaveInterface.php');

class Fmessage implements PlacesToSaveInterface
{
    public $name;
    public $phone;
    public $message;

    public function save()
    {
        $content = [$this->name, $this->phone, $this->message];
        $fileName =  date("d-m-Y-h-i-sa") . '.txt';
        return Storage::disk('local')->put($fileName, json_encode($content));
    }
}
