<?php
if ($_GET['url']) {    //存在url参数
    $url = $_GET['url'];
    if ($_GET['json'] == 'True') {    //返回json数据，默认直接返回图片
        $arr = array(
            'code' => 1,
            'originalURL' => $url,
            'proxyImgURL' => get_proxy_img_url(),
        );
        header('Content-type: application/json');
        echo stripslashes(urldecode(json_encode($arr)));
    } else {
        $new_url = add_protocol_header($url);    //保证url包含协议头
        $img_content = file_get_contents($new_url);
        header('Content-type: image/jpeg;');
        echo $img_content;
    }
} else {
    $arr = array(
        'code' => 0,
        'msg' => 'Error: no url parameter exists'
    );
    header('Content-type: application/json');
    echo stripslashes(urldecode(json_encode($arr)));
}

function add_protocol_header($url)
{
    $preg = '/^http(s)?:\\/\\/.+/';
    if (preg_match($preg, $url)) {
        $new_url = $url;
    } else {
        $new_url = 'http://' . $url;
    }
    return $new_url;
}
function get_proxy_img_url()
{
    $page_url = 'http';
    if ($_SERVER['HTTPS'] == 'on') {
        $page_url .= 's';
    }
    $page_url .= '://';
    if ($_SERVER['SERVER_PORT'] != '80' && $_SERVER['SERVER_PORT'] != '443') {
        $page_url .= $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'];
    } else {
        $page_url .= $_SERVER['SERVER_NAME'];
    }
    $page_url .= $_SERVER['PHP_SELF'] . '?url=' . $_GET['url'];
    return $page_url;
}
?>