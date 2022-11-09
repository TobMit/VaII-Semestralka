<?php


//echo "toto je test";
//echo Config::API_KEY;


//echo \App\Config\Configuration::APP_NAME;

$ch = curl_init("https://api.themoviedb.org/3/trending/movie/week?api_key=27eb20565740115ab47c87a5e07f808d");
curl_exec($ch);
curl_close($ch);
