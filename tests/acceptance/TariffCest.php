<?php


use Page\LoginFormPage;
use Page\MenuPage;
use Page\TariffsGrid;
use Page\Values\TariffValues;
use Page\CreateTariffWindow;
class TariffCest
{
  //tests
  public function tariffTest(AcceptanceTester $I)
  {
    $I->wantTo('Создание и удаление тарифа');
    $loginForm = new LoginFormPage($I);
    $loginForm->login('admin', 'kahkahjoh1');
    $I->waitForText('Администрирование');

    $menu = new MenuPage($I);
    $menu->enterTariffs();

    $tariffsGrid = new TariffsGrid($I);
    $tariffsGrid->openCreateTariffWindow();

    $tariffWindow = new CreateTariffWindow($I);

    $tariff = new TariffValues(true, 'Тестовый', 'Тестовый тариф для тестирования с помощью тестовых средств', 'TARIFF_TEST', '1530', '12 месяцев', 'Российский рубль', 'Списание средств тестовое');
    $tariffWindow->createTariff($tariff);

    $tariffsGrid->deleteTariff($tariff);
  }


}
