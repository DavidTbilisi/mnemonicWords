<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 8/28/2018
 * Time: 11:03 AM
 */


function clog($data, $context="PHP: "){
		echo '<script>';
		echo "console.log('{$context}',". json_encode( $data ) .')';
		echo '</script>';
}