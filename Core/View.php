<?php

namespace Core;

/**
 * View
 * 
 * PHP v 8.0.11
 */
class View
{

  /**
   * Render a view file
   * 
   * @param string $view The view file
   * 
   * @return void
   */
  public static function render($view, $args = [])
  {
    extract($args, EXTR_SKIP);
    
    $file = "../App/Views/$view"; // relative to the core directory

    if (is_readable($file)) {
      require $file;
    } else {
      // echo "$file not found";
      throw new \Exception("$file not found");
    }
  }

  /**
   * Render twig template
   * 
   * @param string $template The template file
   * @param array $args Associative array of data to display in the view (optional)
   * 
   * @return void
   */
  public static function renderTemplate($template, $args = [])
  {
    static $twig = null;

    if ($twig === null) {
      $loader = new \Twig\Loader\FilesystemLoader('../App/Views');
      $twig = new \Twig\Environment($loader);
    }
    echo $twig->render($template, $args);
  }
}