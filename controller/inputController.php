<?php
session_start();
require __DIR__ . '../../application/helpers.class.php';

Helpers::addUpdate();

header('Location:  ../index.php');


