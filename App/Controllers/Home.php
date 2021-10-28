<?php

namespace App\Controllers;

use \Core\View;

/**
 * Home controller
 * 
 * PHP v 8.0.11
 */
class Home extends \Core\Controller
{
  /**
   * Before filter
   * 
   * @return void
   */
  protected function before()
  {
    // echo '(before)';
    // return false;
  }

  /**
   * After filter
   * 
   * @return void
   */
  protected function after()
  {
    // echo '(after)';
  }

  /**
   * Show the index page
   * 
   * @return void
   */
  public function indexAction()
  {
    // echo 'Hello from the index action in the Home controller!';
    View::render('Home/index.php', [
      'name' => 'Dave',
      'colors' => ['red', 'green', 'blue']
    ]);
  }
}