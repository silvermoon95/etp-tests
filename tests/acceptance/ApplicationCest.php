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

/**
 * Тест создания процедуры, подачи заявки на неё, перевода в статус "Подведение итогов"
 *
 * Class ApplicationCest
 */
class ApplicationCest extends CommonCest
{
  public function ApplicationTest(AcceptanceTester $I)
  {
    $I->wantTo('Проверка новой заявки');
    $customer = new Customer($I);

    $procedure = new ProcedureValues('123456789012','Тестовая',false,
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

  protected function cleanup(AcceptanceTester $I)
  {
    while ($procedureId = $I->grabFromDatabase('procedures', 'id', ['title' => 'Тестовая'])) {
      $I->comment("Нашлась удаляемая процедура: $procedureId");
      $lotId = $I->grabFromDatabase('lots', 'id', ['procedure_id' => $procedureId]);

      if ($lotId) {
        $applicationId = $I->grabFromDatabase('applications', 'id', ['lot_id' => $lotId]);
        if ($applicationId) {
          $I->executeQuery("DELETE FROM applications WHERE lot_id = $lotId;");
        }
        $I->executeQuery("DELETE FROM lot_units WHERE lot_id = $lotId;");
        $I->executeQuery("DELETE FROM lot_okved WHERE lot_id = $lotId;");
        $I->executeQuery("DELETE FROM lot_nomenclature WHERE lot_id = $lotId;");
        $I->executeQuery("DELETE FROM lot_delivery_places WHERE lot_id = $lotId;");
        $I->executeQuery("DELETE FROM lot_customers WHERE lot_id = $lotId;");
        $I->executeQuery("DELETE FROM lots WHERE procedure_id = $procedureId;");
      }

      $I->executeQuery("DELETE FROM procedures WHERE id = $procedureId;");
    };
  }
}