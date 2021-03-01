<?php

namespace App\Http\Helper;

class ResponseBilder{
    public static function result($status, $info, $data){
        return [
            "data"=>$data,
            "success"=>$status,
            "information"=>$info,
        ];
    }
}
