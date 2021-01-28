<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Bioudi\LaravelMetaWeatherApi\Weather;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city = $request->input('city');

        $weather = new Weather();

        $res = $weather->getByCityName($city);
        //return response()->json($res);
        if($res!="No result found !")
        {
            $c_weather = $res->consolidated_weather[0];

            $time = $res->time;
            $title = $res->title;
            $longlat = $res->latt_long;
            $timezone=$res->timezone;
            $sun_rise = $res->sun_rise;
            $sun_set = $res->sun_set;
            
            //return response()->json($c_weather);
            return view('farmer.weather')->with('c_weather',$c_weather)->with('sun_set',$sun_set)->with('sun_rise',$sun_rise)->with('time',$time)->with('title',$title)->with('longlat',$longlat)->with('timezone',$timezone);
        }
        else
        {
            return redirect('/farmer/weather')->with('success','Nothing found for this location!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
