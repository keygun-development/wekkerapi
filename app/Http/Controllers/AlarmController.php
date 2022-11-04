<?php

namespace App\Http\Controllers;

use App\Models\Alarm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AlarmController extends Controller
{
    public function setTime(Request $request): \Illuminate\Http\JsonResponse
    {
        if($request->time === null) {
            return response()->json('Geef een tijd op!');
        }

        $alarm = new Alarm();
        $alarm->time = $request->time;
        $alarm->isactive = 1;
        $alarm->save();
        return response()->json('Tijd opgeslagen');
    }

    public function changeState(Request $request): \Illuminate\Http\JsonResponse
    {
        $alarm = (new Alarm)->where('id', $request->id)->get();
        $alarm[0]->isactive = !$alarm[0]->isactive;
        $alarm[0]->save();
        return response()->json('Alarm geupdated');
    }
}
