<?php
header("Content-Type: text/plain");
$zip=$_GET["zip"];

$fp = fopen('uszip.xml', 'r');

// $xml = new SimpleXMLElement('<Location></Location>');

// while ($line = fgetcsv($fp)) {
// 	if (count($line) < 4) continue; // skip lines that aren't full

// 	$node = $xml->addChild('Location');
// 	$node->addChild('Country', $line[0]);
// 	$node->addChild('ZipCode', $line[1]);
// 	$node->addChild('City', $line[2]);
// 	$node->addChild('StateName', $line[3]);
// 	$node->addChild('StateCode', $line[4]);
// }

// echo $xml->saveXML();


$xml=simplexml_load_file("uszip.xml") or die("Error");

foreach ($xml->children() as $location) {
	if($location->ZipCode == $zip)
	{
		//printf("%s-",$location->City);
		echo $location->City.";".$location->StateCode;
		//$this.next.focus();
		//printf("%s",$location->StateCode);
		
	}
}

?>