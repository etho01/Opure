<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{

    public function getText()
    {
        $array = DataController::getData();

        if (count($array) == 0)
        {
            return Response('', 200);
        }
        
        return response('La qualité de l\'eau est a ' . $array['last'] . "\n la moyenne de la semaine est " . $array['avg']);
    }
}
