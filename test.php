<?php

$token= "pk.eyJ1IjoiZm9vZGx5ZiIsImEiOiJja3RvMGkyM2cwN3htMzFyemlxNjVucTMxIn0.-zyhQunYloq9HNypNIaIVQ";
$api = "https://api.mapbox.com/directions/v5/mapbox/driving/121.06304,14.53726;121.06331,14.53779?access_token=".$token;


$raw_data = file_get_contents($api);
$data = json_decode($raw_data);


//print_r($data);
/*
{
	"routes":[{"weight_name":"auto","weight":100.172,"duration":69.576,"distance":188.999,
	"legs": [{"via_waypoints":[],
	"admins":[{"iso_3166_1_alpha3":"PHL","iso_3166_1":"PH"}],
	"weight":100.172,"duration":69.576,"steps":[],
	"distance":188.999,"summary":"South Sea Avenue, Fortune"}],
	"geometry":"{hvwAac|aV`Ak@c@_BgCtA"}],
	"waypoints":[{"distance":0.736,"name":"San Francisco",
					"location":[121.063046,14.537264]},
				{"distance":0.812,"name":"Fortune",
					"location":[121.063316,14.537794]}],
								"code":"Ok","uuid":"R1GVOkTgcM6gSrPu9THGumfV7gq9qpRYJ1r_l0-_l0O9vkDihfD_mw=="
}
*/

function dijkstra($data)
{
	$distance = 0;
	print_r($data->waypoints->distance);
	foreach ($data['waypoints'][0] as $k ) {
		# code...
		echo $k;
	}
}

dijkstra($data);