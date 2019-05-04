<?php

if( isset($_GET['url']) ){
	$url = $_GET['url'];

	if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
	    echo 'Invalid URL.';
	}else{
		$file_headers = @get_headers($url);
		if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {	    
		    echo 'URL does not exsits.';
		}else {
		    echo 'URL exsits.';
		}
	}
	
}


?>