<?php

include_once 'Config.php';
include_once 'Db.php';
include_once 'Qa.php';
include_once 'validatorClass.php';

$config = new Config;
$db = new Db($config);
$validator = new Validator;
$qa = new Qa($db, $validator);