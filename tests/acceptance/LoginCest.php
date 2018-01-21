<?php

use Page\LoginFormPage;
use Step\Admin;
use Step\Customer;
use Step\Supplier;

/**
 * Тесты, связанные с авторизацией
 *
 * Class LoginCest
 */
class LoginCest
{
     //tests
    public function loginTest(AcceptanceTester $I)
    {
      $I->wantTo('Авторизация');
      $loginForm = new LoginFormPage($I);
      $loginForm->login('Кокос', '123');
      $I->see('Регистрация в качестве');
      $I->see('Настройки');
      $loginForm->logout();
    }

    public function enterWithoutRegistrationTest(AcceptanceTester $I)
    {
      $I->wantTo('Просмотр закупки без регистрации');
      $loginForm = new LoginFormPage($I);
      $loginForm->enterWithoutRegistration();
    }

    public function testEmptyLoginPassword(AcceptanceTester $I)
    {
      $I->wantTo('Вход с пустыми полями логина и пароля');
      $I->amOnPage('/');
      $I->waitForText('Вход в систему');

      $I->click('Вход');
      $I->waitForText('Ошибка авторизации. Неверный логин или пароль');
      $I->click('OK');
    }

   public function testWrongPassword(AcceptanceTester $I)
   {
     $I->wantTo('Вход с неверным паролем');
     $I->amOnPage('/');
     $I->waitForText('Вход в систему');
     $I->fillField(LoginFormPage::LOGIN_FIELD, 'Кокос');
     $I->fillField(LoginFormPage::PASSWORD_FIELD, 'wrongpassword');
     $I->click(LoginFormPage::ENTER_BUTTON);
     $I->waitForText('Ошибка авторизации. Неверный логин или пароль');
     $I->click('OK');
   }

  public function tripleLoginTest (AcceptanceTester $I) {
    $I->wantTo('Тройной login/logout');

    $users = [
      new Admin($I),
      new Customer($I),
      new Supplier($I)
    ];

    foreach ($users as $user) {
      $user->login();
      $user->logout();
    }

  }
}
