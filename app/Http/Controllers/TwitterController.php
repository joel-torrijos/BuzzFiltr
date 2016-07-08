<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\TwitterController;
use App\Http\Controllers\View;


use Twitter;

class TwitterController extends Controller
{
    public function welcome()
    {
    	return \View::make('welcome');//->with('person');
    }

    public function search(Request $request)
    {

    	$search = $request->keyword;
    	$searchArray = ['apoy','fire'];

    	$result = Twitter::getSearch(['q'=> $search, 'result' => 'recent', 'format' => 'json']);
  		$array = json_decode( $result, true );

    	//return view('search');

    	echo "<!DOCTYPE html>
		<html lang='en'>
		<head>
		  <title>Bootstrap Example</title>
		  <meta charset='utf-8'>
		  <meta name='viewport' content='width=device-width, initial-scale=1'>
		  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
		  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
		  <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
		</head>
		<body>

		<div class='container'>
		  <h2>TWEETS</h2>
		  <table class='table table-bordered'>
		    <thead>
		      <tr>
		        <th>Time</th>
		        <th>Username</th>
		        <th>Tweet</th>
		      </tr>
		    </thead>
		    <tbody>";

		foreach($array['statuses'] as $tweets) { 
			echo"
		      <tr> 
		        <td>". $tweets['created_at'] . "</td>
		        <td>" . $tweets['user']['name']  ." </td>
		        <td>". $tweets['text'] . "</td>
		      </tr>";
		}

		if($search!= 'sunog')
		{
			echo "</tbody>
				 </table>
				</div>

				</body>
				</html>";
		}


		// foreach($array['statuses'] as $tweets) { //foreach element in $arr
		// 	$user = $tweets['user']['name']; 
		//     $tweet = $tweets['text']; //etc
		//     echo $user . ": " . $tweet . "<br>";
		//     echo $tweets['created_at'] . "<br><br>";
		// }

		else
		{
			foreach($searchArray as $s)
	    	{
	    		$result = Twitter::getSearch(['q'=> $s, 'result' => 'recent', 'format' => 'json']);
		    	$array = json_decode( $result, true );

		    	//dd($array);


				foreach($array['statuses'] as $tweets) { //foreach element in $arr
					echo"<tr> 
				        <td>". $tweets['created_at'] . "</td>
				        <td>" . $tweets['user']['name']  ." </td>
				        <td>". $tweets['text'] . "</td>
				      </tr>";
					// $user = $tweets['user']['name']; 
				 //    $tweet = $tweets['text']; //etc
				 //    echo $user . ": " . $tweet . "<br>";
				 //    echo $tweets['created_at'] . "<br><br>";

				}
	    	}

	    	echo "</tbody>
				 </table>
				</div>

				</body>
				</html>";
		}
    }
}
