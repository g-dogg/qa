<?php

include 'Db.php';
include_once 'Qa.php';
include_once 'validatorClass.php';

//$config = new Config;
//$db = new Db();

Db::connect();
$validator = new Validator;
$qa = new Qa($validator);