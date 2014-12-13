<?PHP
	
	// Make unique id by concatenating websites and removing formatting
	$unique_id = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $_GET["content"]));
	
	// Create redirect file
	$redirect_handle = fopen("../redirects/" . $unique_id .".html", "w+");
	
	// Convert string of URLs into array of URLs
	$urls = explode(",", $_GET["content"]);
	
	$output = "<script type='text/javascript'>\nrandom = Math.random();\n";
	
	$increment = 1 / sizeof($urls);
	foreach( $urls as $url ){
		$output .= "if( random > " . ($increment -  ( 1 / sizeof($urls) ) ) . " && random <= " . $increment . " ) window.location = '" . $url . "';\n";
		$increment += 1 / sizeof($urls);
	}
	
	$output .= "</script>";
	
	fwrite($redirect_handle, $output);
	
	echo json_encode( Array("url" => "http://" . $_SERVER[ 'HTTP_HOST' ] . substr( realpath("../redirects/" . $unique_id . ".html"), strlen( $_SERVER[ 'DOCUMENT_ROOT' ] ) ) ) );
	
	
?>