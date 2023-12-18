<?php
//--- set vars
$full_url_lower = strtolower('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
$full_url = strtolower('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

//=== block user/bot based on Useragent

$agent_array = file(ABSPATH.'/ban-agent.txt', FILE_IGNORE_NEW_LINES);
$agent_array_bad_bot = $agent_array;
$is_bad_bot=0;

	foreach ( $agent_array_bad_bot as $cc ) {
		if ((strpos($_SERVER["HTTP_USER_AGENT"],$cc) !== FALSE)) {
	    	$is_bad_bot=1;
		}
	}
    if ($is_bad_bot == '1') {
        
        header('HTTP/1.1 403 Forbidden');
        header('Retry-After: 300');
        include_once("403.html");
        exit();
    }