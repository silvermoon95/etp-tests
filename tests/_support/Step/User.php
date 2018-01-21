<?php
/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 08.01.2018
 * Time: 2:41
 */

namespace Step;


use AcceptanceTester;
use Page\LoginFormPage;

/**
 * Общий класс для всех юзеров
 *
 * Class User
 * @package Step
 */
class User
{
  /*
 * @var $I AcceptanceTester
 */
  protected $I;

  protected $username;

  protected $password;

  public function __construct(AcceptanceTester $I)
  {
    $this->I = $I;
  }

  public function login() {
    $loginForm = new LoginFormPage($this->I);
    $loginForm->login($this->username, $this->password);
  }

  public function logout() {
    $loginForm = new LoginFormPage($this->I);
    $loginForm->logout();
  }
}