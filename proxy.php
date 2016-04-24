<?php

// Query string is like
// format=  q=
//"https://yioop.com/s/news?f=".$format."&limit=0&num=100&l=en&q=".$query;
//





$query = $_GET['q'];
$format = $_GET['f'];


//$query = "earth";
//$url = "https://yioop.com/s/news?f=rss&limit=0&num=100&q=";
//$ch = curl_init($url.$query);
//$ch = curl_init("https://yioop.com/s/news");
//curl_setopt($ch, CURLOPT_URL, "https://yioop.com/s/news/");

								//$html = file_get_contents($url.$query);
								//var_dump($html);

$url = "https://yioop.com/s/news?f=json&limit=0&num=100";
$url = "https://yioop.com/s/news?f=".$format."&limit=0&num=100&l=en&q=".$query;
$ch = curl_init($url);


curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   	//need to store $output
curl_setopt($ch, CURLOPT_HEADER, false); 			//true if it needs to get header
curl_setopt($ch, CURLOPT_BINARYTRANSFER, false);

//$info = curl_getinfo($ch);
//var_dump($info);

/*
	the following is needed to access to https
		1. need to download cacert.pem from https://curl.haxx.se/docs/caextract.html, and
		2. set one of the following
*/
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__)."/cacert.pem");
curl_setopt($ch, CURLOPT_CAINFO, "cacert.pem");

if(($output=curl_exec($ch)) === false)
{
    echo 'Curl error: ' . curl_error($ch);
}
else
{
	echo $output;

/*
    echo 'Operation completed without any errors';
//	var_dump($output);
	//$words = explode (" ", $output );
	$words = preg_split("/[\s,.{}=\":;\/]+/", $output);
	echo("<p>");
	$dictionary = array_count_values($words);
	//print_r($dictionary);
	echo("<p>");
	arsort($dictionary);
	//print_r($dictionary);
	//print_r(asort($dictionary));

	$ret = json_encode($dictionary);
	echo $ret;
	//var_dump($words);
*/
/*
	$termlist=array();

	echo "*************************************";

	foreach ($words as $key => $value){
		if (isset($termlist[$value])){
			$termlist[$value]++;
		}else {
			$termlist[$value]=1;
		}
	}
*/
/*
	foreach ($termlist as $key => $value){
		if ($termlist[$key]>1){
			echo "( ".$key." , ".$termlist[$key].")"."<p/>";
		}
	}
*/
}




//$output = curl_exec($ch);
//var_dump($output);

//$fh = fopen("c:\\temp\\hw4.txt", 'w');
//fwrite($fh, $output);
//fclose($fh);
curl_close($ch);
?>
