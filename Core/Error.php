<?php

namespace Core;

/**
 * Error and exception handler
 * 
 * PHP v 8.0.11
 */
class Error
{

  /**
   * Error handler. Convert all errors to Exceptions by throwing an Exception any time there is an error.
   * 
   * @param int $level Error level
   * @param string $message Error message
   * @param string $file Filename the error was raised in
   * @param int $line Line number in the file that caused the error
   * 
   * @return void
   */
  public static function errorHandler($level, $message, $file, $line)
  {
    if (error_reporting() !== 0) { // to keep the @ operator working
      throw new \ErrorException($message, 0, $level, $file, $line);
    }
  }

  /**
   * Exception handler
   * 
   * @param Exception $exception The exception
   * 
   * @return void
   */
  public static function exceptionHandler($exception)
  {
    // Code is 404 (not found) or 500 (general error).
    $code = $exception->getCode();
    if ($code != 404){
      $code = 500;
    }
    http_response_code($code);
    // Use the show errors variable to determine how errors are shown. If in development, set SHOW_ERRORS to true, and detailed error messages will be shown on screen. If in production, set SHOW_ERRORS to false and errors will be logged to the /logs folder, but only a generic error will be shown on screen.
    if (\App\Config::SHOW_ERRORS) {
      echo "<h1>Fatal Error</h1>";
      echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
      echo "<p>Message: '" . $exception->getMessage() . "'</p>";
      echo "<p>Stack trace: <pre>" . $exception->getTraceAsString() . "</pre></p>";
      echo "<p>Thrown in '" . $exception->getFile() . "' on line " .
            $exception->getLine() . "</p>";
    } else {
      $log = dirname(__DIR__) . '/logs/' . date('Y-m-d') . '.txt';
      ini_set('error_log', $log);

      $message = "Uncaught exception: '" . get_class($exception) . "'";
      $message .= " with message '" . $exception->getMessage() . "'";
      $message .= "\nStack trace: " . $exception->getTraceAsString();
      $message .= "\nThrown in '" . $exception->getFile() . "' on line " . $exception->getLine();

      error_log($message);
      /*
      if ($code == 404){
        echo "<h1>Page not found</h1>";
      } else {
        echo "<h1>An error occurred</h1>";
      }
      */
      View::renderTemplate("Errors/$code.html");
    }
  }
}