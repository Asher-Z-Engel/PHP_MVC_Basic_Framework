<?php

namespace App;


/**
 * Application configuration
 * 
 * PHP v 8.0.11
 */

 /**
  * You will need to create an App/Env.php with an Env class containing your env variables in order to use the framework
  */
class Config
{
  /**
   * Database host
   * @var string
   */
  const DB_HOST = \App\Env::DB_HOST;

  /**
   * Database name
   * @var string
   */
  const DB_NAME = \App\Env::DB_NAME;

  /**
   * Database user
   * @var string
   */
  const DB_USER = \App\Env::DB_USER;

  /**
   * Database password
   * @var string
   */
  const DB_PASSWORD = \App\Env::DB_PASSWORD;

  /**
   * Show or hide error messages on screen
   * @var boolean
   */
  const SHOW_ERRORS = false;
}