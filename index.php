<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "Root_12345";
$database = "sandbox";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM markdown_api_tb";
$result = mysqli_query($conn, $sql);

// function el($times = 1)
// {
// 	$output = PHP_EOL;

// 	if ($times > 1) {
// 		for ($i = 0; $i < $times; $i++) { 
// 			$output = $output  PHP_EOL; 
// 		}
// 	}

// 	return $output;
// }

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	$fileContent = '';
	
    while($row = mysqli_fetch_assoc($result)) {
    	$title = "## **". $row['id'] .". ". $row['title'] ."**". PHP_EOL. PHP_EOL;
    	$url = "**URL** : `". $row['url'] . "`". PHP_EOL. PHP_EOL;
    	$method = "**Method** : `". $row['method'] ."`". PHP_EOL. PHP_EOL;
    	$header = ($row['header'] === '') ? '' : "**Header**  : `". $row['header'] ."`". PHP_EOL. PHP_EOL;
    	$auth = "**Auth required**  :  ". $row['auth_required']. PHP_EOL. PHP_EOL;
    	$request_body = ($row['request_body'] === '') ? '' : "**Data constraints**". PHP_EOL . PHP_EOL ."```json".PHP_EOL. $row['request_body'] . PHP_EOL ."```". PHP_EOL;
    	$success_response = ($row['success_response'] === '') ? '' : "### Success Responses". PHP_EOL . PHP_EOL ."```json". PHP_EOL . $row['success_response'] . PHP_EOL ."```". PHP_EOL;
    	$error_response = ($row['error_response'] === '') ? '' : "### Error Responses". PHP_EOL . PHP_EOL ."```json". PHP_EOL . $row['error_response']  . PHP_EOL ."```". PHP_EOL;

        $fileContent = $fileContent . $title . $url . $method . $header . $auth . $request_body . $success_response. $error_response;
    }
} else {
    echo "0 results";
}

$path =$_SERVER['DOCUMENT_ROOT'] . "/sandbox/markdown_api_tb.md";
$fp = fopen($path,"wb");
fwrite($fp,$fileContent);
fclose($fp);