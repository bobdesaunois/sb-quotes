<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    
    public function index ()
    {

        return response ()->json 
        (
            [
                "api" =>
                [
                    "version" => "1.0.0"
                ,   "name"    => "SB Quotes"
                ,   "author"  => "Bob Desaunois"
                ,   "company" => "Social Brothers"
                ,   "source"  => "PHP / Lumen micro-framework"
                ]
            ]
        );

    }

}
