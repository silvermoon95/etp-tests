<?php

use Page\Values\LotValues;
use Page\Values\ProcedureValues;
use Step\Customer;

/**
 * Тест создания процедуры заказчиком
 *
 * Class ProcedureCest
 */
class ProcedureCest extends CommonCest
{
  public function ProcedureTest(AcceptanceTester $I)
  {
    $I->wantTo('Создание процедуры и проверка извещения');
    $customer = new Customer($I);

    $procedure = new ProcedureValues('123456789012','Тестовая2',false,
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

  protected function cleanup(AcceptanceTester $I)
  {
    while ($procedureId = $I->grabFromDatabase('procedures', 'id', ['title' => 'Тестовая2'])) {
      $I->comment("Нашлась удаляемая процедура: $procedureId");
      $lotId = $I->grabFromDatabase('lots', 'id', ['procedure_id' => $procedureId]);

      if ($lotId) {
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
