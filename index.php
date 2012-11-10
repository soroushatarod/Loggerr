<?php

error_reporting(E_ALL);
require_once 'FileHandler.php';
require_once 'logClass.php';

$arr = array('aname'=>'erere');
Log::getInstance()->logError('erere');
Log::getInstance()->logTest($arr,'green');

?>
