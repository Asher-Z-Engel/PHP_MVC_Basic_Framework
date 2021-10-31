<?php

namespace Core;

use PDO;
use App\Config;

/**
 * Base Model
 * 
 * PHP v 8.0.11
 */
abstract class Model
{

  /**
   * Get the PDO database connection
   * 
   * @return mixed
   */
  protected static function getDB()
  {
    static $db = null;

    // In order to use the framework to connect to the database, you need to create an App/Env.php file that has a class called Env, and sets the variables used in the Config class.
    if ($db === null) {
      $host = Config::DB_HOST;
      $dbname = Config::DB_NAME;
      $username = Config::DB_USER;
      $password = Config::DB_PASSWORD;

      $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

      // Throw an Exception when an error occurs
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
      return $db;
    }
  }
}