<?php

require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;


$client = HttpClient::create();
$response = $client->request('POST', 'http://www.nepalstock.com/todaysprice', [
	'body' => [
		'_limit' => '500'
	]
]);

$statusCode = $response->getStatusCode();
// $statusCode = 200
$contentType = $response->getHeaders()['content-type'][0];
// $contentType = 'text/html'
$html = $response->getContent();

// $html = file_get_contents($nepalstock_html);

$crawler = new Crawler($html);
$crawler = $crawler->filter('table tr:not(:first-child)');
// die(var_dump($crawler));

$head = true; 
$data = [];
foreach ($crawler as $row) {
	if($head){
		$head = false;
		continue;
	}
	$row = explode("\n", $row->nodeValue);

    $company = [];
    if(!isset($row[2]) || !isset($row[6]) || !isset($row[8])){
    	continue;
    }
    $company['name'] = trim($row[2]);
    $company['closing_price'] = trim($row[6]);
    $company['prev_closing_price'] = trim($row[9]);
    $company['diff'] = trim($row[10]);

    array_push($data, $company);
}

echo json_encode($data);


