<?php
	require_once('TwitterAPIExchange.php');

	/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
	$settings = array(
	    'oauth_access_token' => "60475762-aAZA75MyJbXWZEJ1BSpZieC4fwBd01kYa6qbz1j9j",
	    'oauth_access_token_secret' => "hNVGlQM7SBcz8QKZDjgzv06Rj9iqkISriF0tnRASi8k",
	    'consumer_key' => "q3qjxM2yHIjdZaHOsJjpTw",
	    'consumer_secret' => "RRdMK8lvQUfAkhwP8gWx13txTnGDkYtSbJmCy2ffeDg"
	);

	/** Note: Set the GET field BEFORE calling buildOauth(); **/
	$url = 'https://api.twitter.com/1.1/trends/place.json';
	$getfield = '?id=1';
	$requestMethod = 'GET';
	$twitter = new TwitterAPIExchange($settings);
	$json_trendArray = $twitter->setGetfield($getfield)
					->buildOauth($url, $requestMethod)
					->performRequest();

	$json_output = json_decode($json_trendArray, true);
	
	foreach ($json_output[0]['trends'] as $trends) {
		$trend = $trends['name'];
		$url = $trends['url'];
		echo "$trend | $url\n";
	}
	
?>