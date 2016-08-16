<?php

class Db
{
  /**
   * [$config description]
   * @var [type]
   */

  private static $dbConfig = [
            'dsn'          =>'mysql:host=localhost;dbname=qa',
            'username' =>'root',
            'password' =>'1234',
            'charset'    =>'utf8'
  ];
  protected static $instance = NULL;
  private $dbh;
  private static $opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ];
/**
 * еще не понятно, надо ли
 * @param Config $config [description]
 */

  public function __construct()
  {

  }

  public static function connect()
    {
      if(NULL === self::$instance)
      {
        try
        {
          self::$instance = new PDO(self::$dbConfig['dsn'], self::$dbConfig['username'], self::$dbConfig['password'], self::$opt);
          //$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          self::$instance->exec("SET CHARACTER_SET_CLIENT=" . self::$dbConfig['charset']);
          self::$instance->exec("SET CHARACTER_SET_RESULTS=" . self::$dbConfig['charset']);
          self::$instance->exec("SET COLLATION_CONNECTION='utf8_general_ci'");
        }
        catch (PDOException $e)
        {
            //
          echo $e->getMessage();
        }
      }
      return self::$instance;
    }

    public static function __callStatic($method, $args)
    {
        return call_user_func_array(array(self::instance(), $method), $args);
    }
}