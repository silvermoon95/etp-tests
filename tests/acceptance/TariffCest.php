<?php


use Page\Values\TariffValues;

use Step\Admin;

/**
 * Тест создания и удаления тарифа админом
 *
 * Class TariffCest
 */
class TariffCest extends CommonCest
{
  //tests
  public function tariffTest(AcceptanceTester $I)
  {
    $I->wantTo('Создание и удаление тарифа');
    $admin = new Admin($I);

    $tariff = new TariffValues(true, 'Тестовый',
      'Тестовый тариф для тестирования с помощью тестовых средств', 'TARIFF_TEST', '1530',
      '12 месяцев', 'Российский рубль', 'Списание средств тестовое');
    $admin->login();
    $admin->createTariff($tariff);
    $admin->deleteTariff($tariff);
    $admin->logout();
  }

  protected function cleanup(AcceptanceTester $I)
  {
    while ($tariffId = $I->grabFromDatabase('tariffs', 'id', ['name' => 'Тестовый'])) {
      $I->comment("Нашелся удаляемый тариф: $tariffId");
      $I->executeQuery("DELETE FROM tariffs WHERE id = $tariffId");
    };
  }

}
