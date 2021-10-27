<?php

namespace App\Controllers\Admin;

/**
 * User admin controller
 * 
 * PHP v 8.0.11
 */
class Users extends \Core\Controller
{

  /**
   * Before filter
   * 
   * @return void
   */
  protected function before()
  {
    // Make sure user is logged in, for example
    // return false;
  }

  /**
   * Show the index page
   * 
   * @return void
   */
  protected function indexAction()
  {
    echo "Hello from the index method in the Users controller!";
  }
}