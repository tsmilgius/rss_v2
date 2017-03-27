<?php

include __SITE_PATH . '/application/' . 'controller_base.class.php';
include __SITE_PATH . '/application/' . 'registry.class.php';
include __SITE_PATH . '/application/' . 'router.class.php';
include __SITE_PATH . '/application/' . 'template.class.php';
include __SITE_PATH . '/application/' . 'helpers.class.php';

function __autoload($class_name) {
    $filename = strtolower($class_name) . '.class.php';
    $file = __SITE_PATH . '/model/' . $filename;

    if (file_exists($file) == false)
    {
        return false;
    }
  include ($file);
}


$registry = new registry;


$registry->db = db::getInstance();
