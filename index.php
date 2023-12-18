<?php

//
// error_reporting(0);

//
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
//--------------------------------------- user Agents
require_once(ABSPATH.'agent.php');
//--------------------------------------- router
require_once(ABSPATH.'router.php');

exit;
