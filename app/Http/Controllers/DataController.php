<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    public static function getDataFromWebsiteServ()
    {
        exec('curl -s -H "Range: bytes=-5040" https://storage.googleapis.com/mollusques-caen/data.csv', $list);
        $data = implode("\n", $list);
        Storage::disk('public')->put('cache.csv', $data);
    }

    public static function getData()
    {
        $data = Storage::disk('public')->get('cache.csv');
        $list = explode("\n", $data);
        $array = [];
        $sum = 0;
        foreach ($list as $i => $element)
        {
            $array[$i] = explode(',', $element);
            $sum += floatval($array[$i][1]);
        }

        if (Storage::disk('public')->get('killSwitch.txt') == "1")
        {
            return [];
        }

        return [
            'last' => static::transformData($array[count($array) - 1][1]),
            'avg' => static::transformData($sum / (count($array)))
        ];
    }

    public static function transformData($data)
    {
        return (round($data / 2));
    }

    public function getText()
    {
        $array = DataController::getData();
        if (count($array) == 0)
        {
            return Response('', 200);
        }
        return response('La qualité de l\'eau est a ' . $array['last'] . "/5\n la moyenne de la semaine est " . $array['avg']);
    }
}
