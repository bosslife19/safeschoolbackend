<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SchoolsController extends Controller
{
    public function fetchSchoolsInState(Request $request){
        $state =$request->state; // Replace with your dynamic state
$apiKey = getenv('GOOGLE_MAPS_API_KEY'); 


$query = "schools in {$state}, USA";
$url = "https://maps.googleapis.com/maps/api/place/textsearch/json";

$response = Http::get($url, [
    'query' => $query,
    'key' => $apiKey,
]);

$data = $response->json();
return response()->json(['schools'=>$data],200);

    }
}
