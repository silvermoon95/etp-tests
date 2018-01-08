<?php
/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 08.01.2018
 * Time: 2:51
 */

namespace Step;


use Page\CreateTariffWindow;
use Page\MenuPage;
use Page\TariffsGrid;
use Page\Values\TariffValues;

class Admin extends User
{
  protected $username = 'admin';
  protected $password = 'kahkahjoh1';

  public function createTariff(TariffValues $tariff)
  {
    $I = $this->I;
    $I->waitForText('Администрирование');

    $menu = new MenuPage($I);
    $menu->enterTariffs();

    $tariffsGrid = new TariffsGrid($I);
    $tariffsGrid->openCreateTariffWindow();

    $tariffWindow = new CreateTariffWindow($I);
    $tariffWindow->createTariff($tariff);
  }

  public function deleteTariff(TariffValues $tariff)
  {
    $I = $this->I;
    $I->waitForText('Администрирование');

    $menu = new MenuPage($I);
    $menu->enterTariffs();

    $tariffsGrid = new TariffsGrid($I);
    $tariffsGrid->deleteTariff($tariff);
  }

}