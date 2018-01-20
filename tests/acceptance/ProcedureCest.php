<?php

use Page\Values\LotValues;
use Page\Values\ProcedureValues;
use Step\Customer;
class ProcedureCest
{
  public function ProcedureTest(AcceptanceTester $I)
  {
    $I->wantTo('Создание процедуры и проверка извещения');
    $customer = new Customer($I);

    $procedure = new ProcedureValues('123456789012','Тестовая6',false,
      '30.01.2018','20:00',
      '30.01.2018','23:00','Тестовый документ',
      'test.txt', new LotValues('Тестовый','Тест',
        '01 Продукция и услуги сельского хозяйства и охоты',
        'A СЕЛЬСКОЕ, ЛЕСНОЕ ХОЗЯЙСТВО, ОХОТА, РЫБОЛОВСТВО И РЫБОВОДСТВО','Тест'));
    $customer->login();
    $customer->createProcedure($procedure);
    $customer->checkProcedureValues($procedure);
    $customer->logout();

  }
}
