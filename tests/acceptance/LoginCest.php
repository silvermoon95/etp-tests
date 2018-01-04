<?php
use Page\LoginFormPage;

class LoginCest
{
    // tests
    public function loginTest(AcceptanceTester $I)
    {
      $I->wantTo('Авторизация');
      $loginForm = new LoginFormPage($I);
      $loginForm->login('Кокос', '123');
      $loginForm->logout();
    }


}
