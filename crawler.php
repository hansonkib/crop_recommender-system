<?php
require 'vendor/autoload.php';
use Goutte \Client;
$url_to_traverse='http://localhost/crop_recommender/crop_lists.html';
$client = new Client();
$crawler=$client->request('GET',$url_to_traverse);
$crawler->filterXPath('html/head/title')->text();
$h1_count=$crawler->filter('h1')->count();
// $h1_contents=array();
$h1_contents=$crawler->filter('h1')->text();
echo $h1_count;
echo $h1_contents;
?>