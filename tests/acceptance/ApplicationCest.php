<?php

use Page\Values\ApplicationValues;
use Page\Values\LotChangeValues;
use Page\Values\LotValues;
use Page\Values\ProcedureValues;
use Step\Admin;
use Step\Customer;
use Step\Supplier;

/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 19.01.2018
 * Time: 21:38
 */

class ApplicationCest
{
  public function ApplicationTest(AcceptanceTester $I)
  {
    $I->wantTo('Проверка новой заявки');
    $customer = new Customer($I);

    $procedure = new ProcedureValues('123456789012','Тестовая16',false,
      '30.01.2018','20:00',
      '30.01.2018','23:00','Тестовый документ',
      'test.txt', new LotValues('Тестовый','Тест',
        '01 Продукция и услуги сельского хозяйства и охоты',
        'A СЕЛЬСКОЕ, ЛЕСНОЕ ХОЗЯЙСТВО, ОХОТА, РЫБОЛОВСТВО И РЫБОВОДСТВО','Тест'));
    $customer->login();
    $customer->createProcedure($procedure);
    $customer->logout();

    $supplier = new Supplier($I);

    $application = new ApplicationValues('172636, Российская Федерация, Московская область, Москва, Тверская, 234',
      '123456', 'Тестовый документ', 'test.txt', '1234567', 'Кокос');
    $supplier->login();
    $supplier->createApplication($procedure, $application);
    $supplier->logout();

    $admin = new Admin($I);
    $lotChangeValues = new LotChangeValues('Подведение итогов', 'Тестовое');
    $admin->login();
    $admin->returnProcedureToPreviousStage($procedure,$lotChangeValues);
    $admin->logout();

    $customer->login();
    $customer->checkApplicationValues($procedure, $application);
    $customer->logout();
  }
}