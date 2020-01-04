<?php
if ($_GET['url']) {                            //存在url参数
	$url = $_GET['url'];
	$new_url = add_protocol_header($url);      //保证url包含协议头
	$img_content = file_get_contents($new_url);
	if ($_GET['svg'] == 'True') {
		header('Content-type: image/svg+xml;');
	} else {
		header('Content-type: image/jpeg;');
	}
	echo $img_content;
} else {
	$arr = array(
	        'code' => 0,
	        'msg' => 'Error: no url parameter exists'
	    );
	header('Content-type: application/json');
	echo stripslashes(urldecode(json_encode($arr)));
}

function add_protocol_header($url) {
	$preg = '/^http(s)?:\\/\\/.+/';
	if (preg_match($preg, $url)) {
		$new_url = $url;
	} else {
		$new_url = 'http://' . $url;
	}
	return $new_url;
}
?>