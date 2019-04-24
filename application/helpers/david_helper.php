<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 8/28/2018
 * Time: 11:03 AM
 */

define('HOME', $_SERVER['DOCUMENT_ROOT'].'/mnemonicWords');


function clog($data, $context="PHP: "){
		echo '<script>';
		echo "console.log('{$context}',". json_encode( $data ) .')';
		echo '</script>';
}

function dd ($data){
	$info = <<<DOC
<pre>
print_r($data);
</pre>
DOC;
die ($info);
}

function csvToJson($filename,$isobj = null){
	$fh = fopen("{$filename}.csv", "r");

//Setup a PHP array to hold our CSV rows.
	$csvData = array();

//Loop through the rows in our CSV file and add them to
//the PHP array that we created above.
	while (($row = fgetcsv($fh, 0, ",")) !== FALSE) {
		$csvData[] = $row;
	}

//Finally, encode our array into a JSON string format so that we can print it out.
	if ($isobj == null) {
		return json_encode($csvData, JSON_UNESCAPED_UNICODE );
	} else{
		return json_encode($csvData, JSON_FORCE_OBJECT |JSON_UNESCAPED_UNICODE );

	}
}
