<?php

require __DIR__ . '/vendor/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', 'QbpyNZyNDrzkmgUaQr1D7KNse');
define('CONSUMER_SECRET', 'CWjRaL4CxK7lCpydG8Fjxf7tVmvSXWJfuqrMnvz6gA2bqa5FPz');
define('ACCESS_TOKEN', '402077723-cQ4FJ7JaYdIrkVmZRsJTp0VUdeKRkoziheKQqeXU');
define('ACCESS_TOKEN_SECRET', 'gOBL8hPLKN5uVepog6tCOF2JdC5jknKHx3cuNAL4jmU5J');

$toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

$max_id = "";
foreach (range(1, 10) as $i) { // up to 10 result pages

  $query = array(
    "q" => "#ff7 since:2014-03-27 until:2015-04-15", // Change here
    "count" => 20,
    "result_type" => "mixed",
    "max_id" => $max_id,
  );

  $results = $toa->get('search/tweets', $query);

  foreach ($results->statuses as $result) {
    echo " [" . $result->created_at . "] " . $result->user->screen_name . ": " . $result->text . "\n";
    //echo $result
    $max_id = $result->id_str; // Set max_id for the next search result page
  }
}


?>
