<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use PHPUnit_Framework_AssertionFailedError;

class Acceptance extends \Codeception\Module
{
  function isTextVisible($text)
  {
    try {
      $this->getModule('WebDriver')->see($text);
    } catch (PHPUnit_Framework_AssertionFailedError $f) {
      return false;
    }
    return true;
  }
}
