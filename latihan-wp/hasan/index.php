<?php

ini_set('max_execution_time', 300);
if (function_exists('date_default_timezone_set')) date_default_timezone_set('Asia/Jakarta');

if (!session_id()) session_start();

require_once '../app/init.php';

$application = new App();
