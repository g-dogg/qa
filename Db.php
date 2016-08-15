<?php

class Db
{
  private $config;
  private $configArray = [];
/**
 * еще не понятно, надо ли
 * @param Config $config [description]
 */

  public function __construct(Config $config)
  {
    $this->config = $config;
  }
/*
  private  $dbConfig = [
     'dsn'=>'mysql:host=localhost;dbname=coordinat',
  		'username'=>'root',
  		'password'=>'1234',
  		'charset'=>'utf8',
  	];
*/
    public function getConfArray()
    {
        return $this->config->getDbConfig();
    }

  private static $opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ];

  public function connect()
  {
      try
      {
        $this->configArray = $this->getConfArray();
        $db = new PDO($this->configArray['dsn'], $this->configArray['username'], $this->configArray['password'], self::$opt);
        //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET CHARACTER_SET_CLIENT=" . $this->configArray['charset']);
        $db->exec("SET CHARACTER_SET_RESULTS=" . $this->configArray['charset']);
        $db->exec("SET COLLATION_CONNECTION='utf8_general_ci'");
      }
      catch (PDOException $e)
      {
          //
        echo $e->getMessage();
      }
    }
}