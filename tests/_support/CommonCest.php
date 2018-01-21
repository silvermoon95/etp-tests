<?php
/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 21.01.2018
 * Time: 2:23
 */

/**
 * Общий класс для всех тестов, который выполняет перед и после теста очистку тестовых значений в БД
 * с помощью переопределяемого метода cleanup
 *
 * Class CommonCest
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

  /**
   * Очищение из БД всех тестовых данных, которые были созданы в рамках текущего теста
   *
   * @param AcceptanceTester $I
   */
  abstract protected function cleanup(AcceptanceTester $I);
}