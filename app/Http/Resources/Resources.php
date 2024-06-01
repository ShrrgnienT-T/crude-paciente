<?php

namespace App\Http\Resources;
Use App\Models\County;


class Resources{
    static public function getCounties(){
        return County::orderBy('name')->get();
    }

}

