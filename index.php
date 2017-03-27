<?php
if(!isset($_SESSION))
session_start();

if (!isset($_COOKIE['visits']))
$_COOKIE['visits'] = 0;
$visits = $_COOKIE['visits'] + 1;
setcookie('visits',$visits,time()+3600*24*10);

if (!isset($_COOKIE['visit_duration']))
$_COOKIE['visit_duration'] = 1;
$visit_time = date("Y-m-d H:i:s");
setcookie('visit_duration', $visit_time, time()+3600*24*10);

error_reporting(E_ALL);


$site_path = realpath(dirname(__FILE__));
define ('__SITE_PATH', $site_path);

include 'includes/init.php';


$registry->router = new router($registry);


$registry->router->setPath (__SITE_PATH . '/controller');


$registry->template = new template($registry);


$registry->router->loader();
