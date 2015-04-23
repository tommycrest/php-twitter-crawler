<?php

require __DIR__ . '/vendor/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', '');
define('CONSUMER_SECRET', '');
define('ACCESS_TOKEN', '');
define('ACCESS_TOKEN_SECRET', '');

$toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

$max_id = "";
foreach (range(1, 20) as $i) { // up to 20 result pages

  $query = array(
    "q" => "#transformers4 since:2014-06-20 until:2014-07-09",
    "count" => 100,
    "result_type" => "mixed",
    "max_id" => $max_id,
    "lang" => "en"
  );

  $results = $toa->get('search/tweets', $query);
  //echo json_encode($results->statuses);

  print_r(json_encode($results));

/*
  foreach ($results->statuses as $result) {
    echo " [" . $result->created_at . "] " . $result->user->screen_name . ": " . $result->text . "\n";
    //echo $result
    $max_id = $result->id_str; // Set max_id for the next search result page
  }
*/

}


?>
