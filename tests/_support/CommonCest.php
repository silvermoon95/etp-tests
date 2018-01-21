<?php
/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 21.01.2018
 * Time: 2:23
 */

abstract class CommonCest
{
  // зачистка тестовых данных перед тестом и после
  public function _before(AcceptanceTester $I)
  {
    $this->cleanup($I);
  }

  public function _after(AcceptanceTester $I)
  {
    $this->cleanup($I);
  }

  abstract protected function cleanup(AcceptanceTester $I);
}