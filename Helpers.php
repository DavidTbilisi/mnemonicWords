<?php class Helpers {

	// REST

	public static function req( $key, $default=null ) {
		if ( isset( $_REQUEST[$key] ) && $_REQUEST[$key] != null )
		{
			return $_REQUEST[$key];
		}
		else
		{
			return $default;
		}
	}

	public static function json( $data ) {
		return json_encode( $data , JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
	}

	// DEBUGGING

	public static function dump( $data ) {
		echo "<pre style='color:white;background: rgba(13,19,22,0.84);padding:2rem;'>";
		print_r($data);
		echo "</pre>";
	}

	public static function dd( $data ) {
		self::dump($data);
		die;
	}

	public static function clog( $data, $context = "PHP: " ) {
		echo '<script>';
		echo "console.log('{$context}', ".json_encode( $data , JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE)." );</script>";
	}

} ?>