<?php
header("Content-type: image/jpeg;");
$img_url = $_GET["url"];
$preg = "/^http(s)?:\\/\\/.+/";
if (preg_match($preg, $img_url)) {
    $img_content = file_get_contents($img_url);
} else {
    $new_url = "http://".$img_url;
    $img_content = file_get_contents($new_url);
}
echo $img_content;
?>