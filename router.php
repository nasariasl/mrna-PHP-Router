<?php 

//=== url parse
//  var_dump(parse_url($full_url));
$URL_SCHEME = (parse_url($full_url, PHP_URL_SCHEME));
$URL_USER = (parse_url($full_url, PHP_URL_USER));
$URL_PASS = (parse_url($full_url, PHP_URL_PASS));
$URL_HOST = (parse_url($full_url, PHP_URL_HOST));
$URL_PORT = (parse_url($full_url, PHP_URL_PORT));
$URL_PATH = (parse_url($full_url, PHP_URL_PATH));
$URL_QUERY = (parse_url($full_url, PHP_URL_QUERY));
$URL_FRAGMENT = (parse_url($full_url, PHP_URL_FRAGMENT));

$URL_PATH_explode = explode('/', $URL_PATH);
$URL_PATH_explode_filter= array_filter($URL_PATH_explode);
//===  Home

  $homeurl_index = '/index.php';                               
  $homeurl_index2 = '/index.html';                               
  $homepage_dash = "/";
  $currentpage = $_SERVER['REQUEST_URI'];
//  echo pathinfo($currentpage, PATHINFO_FILENAME);

  if($currentpage == $homeurl_index || $currentpage == $homepage_dash || $currentpage == $homeurl_index2 ) {
     require_once(ABSPATH.'/home.html');
     die();
  }
  
//======================================================== remove .html ext
// $URL_PATH_explode_filter[1] = str_replace('.html','',$URL_PATH_explode_filter[1]);
// $URL_PATH_explode_filter[1] = str_replace('.php','',$URL_PATH_explode_filter[1]);
// $URL_PATH_explode_filter[1] = str_replace('.txt','',$URL_PATH_explode_filter[1]);
// $URL_PATH_explode_filter[1] = str_replace('.xml','',$URL_PATH_explode_filter[1]);
//======================================================== switch
switch ($URL_PATH_explode_filter[1]) {
    
        case 'blog':
            include_once(ABSPATH."/blog.html");
            break;
        case 'contact':
            include_once(ABSPATH."/contact.html");
            break;

        default:
            header("HTTP/1.0 404 Not Found");
            include_once("404.html");
            exit();
            
}

