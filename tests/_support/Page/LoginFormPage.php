<?php
/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 05.01.2018
 * Time: 1:38
 */
namespace Page;

use AcceptanceTester;

class LoginFormPage
{
  const LOGIN_FIELD = 'input[name="username"]';
  const PASSWORD_FIELD = 'input[name="pass"]';
  const ENTER_BUTTON = 'Вход';
  const EXIT_BUTTON = 'Выход';
  const WITHOUT_REGISTRATION_LINK = 'Просмотреть закупки без регистрации';

  /*
   * @var $I AcceptanceTester
   */
  private $I;

  public function __construct(AcceptanceTester $I)
  {
    $this->I = $I;
  }

  public function login($username, $password)
  {
    /**
     * @var $I AcceptanceTester
     */
    $I = $this->I;

    $I->amOnPage('/');
    $I->waitForText('Вход в систему');
    $I->fillField(self::LOGIN_FIELD, $username);
    $I->fillField(self::PASSWORD_FIELD, $password);
    $I->click(self::ENTER_BUTTON);
    $I->waitForText(self::EXIT_BUTTON);
  }

  /**
   *
   */
  public function logout()
  {
    $I = $this->I;

    $I->click(self::EXIT_BUTTON);
    $I->waitForText('Вход в систему');
  }

}