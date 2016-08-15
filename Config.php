<?php

class Config
{

    private static $dbConfig = [
            'dsn'          =>'mysql:host=localhost;dbname=qa',
            'username' =>'root',
            'password' =>'1234',
            'charset'    =>'utf8'
	];

    private $pageTitle = "Форма отправки вопросов";

    public function getDbConfig()
    {
        return self::$dbConfig;
    }

    public static function getRootPath()
    {
        return "//".$_SERVER['SERVER_NAME']."/";
    }

    public function getTitle()
    {
        return $this->pageTitle;
    }
}