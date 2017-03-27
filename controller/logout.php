<?php
session_start();
require __DIR__ . '../../application/helpers.class.php';
Helpers::addUpdate();
session_unset();
header("Location: ../index.php");

