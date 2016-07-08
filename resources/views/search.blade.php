@extends('layout')

@section('content')
		<?php
		dd($person);
		?>

    	<!-- return view('search');

    	$searchArray = ['apoy','fire']; -->

    	 <?php
    	 $result = Twitter::getSearch(['q'=> $search, 'result' => 'recent', 'format' => 'json']);
  		 $array = json_decode( $result, true );
  		 var_dump($result);
  		 ?>

  		 <!-- //dd($array);


		foreach($array['statuses'] as $tweets) { //foreach element in $arr
			$user = $tweets['user']['name']; 
		    $tweet = $tweets['text']; //etc
		    echo $user . ": " . $tweet . "<br>";
		    echo $tweets['created_at'] . "<br><br>";
		} -->

        

@stop