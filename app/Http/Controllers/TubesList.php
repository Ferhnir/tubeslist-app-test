<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class TubesList extends Controller
{

    public function index() {

        return view('travel', [
            'lastUpdate'  => Cache::get('lastUpdateDate'),
            'tubesStatus' => Cache::get('cachedTubesStatus')
            ]
        );

    }

    public function show($id) {

        $tubesData = collect(Cache::get('cachedTubesStatus'));

        $tubeDetails = $tubesData->where('id', $id)->first();

        return view('tubeDetails', [
            'lastUpdate'  => Cache::get('lastUpdateDate'),
            'tubeDetails' => $tubeDetails
            ]
        );
        
    }


}
