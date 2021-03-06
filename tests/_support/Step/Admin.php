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
use Page\ProceduresGrid;
use Page\ReturnProcedureToPreviousStageWindow;
use Page\TariffsGrid;
use Page\Values\LotChangeValues;
use Page\Values\ProcedureValues;
use Page\Values\TariffValues;

/**
 * Админ
 *
 * Class Admin
 * @package Step
 */
class Admin extends User
{
  protected $username = 'admin';
  protected $password = 'kahkahjoh1';

  /**
   * Действие создания тарифа
   *
   * @param TariffValues $tariff
   */
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

  /**
   * Действие удаления тарифа
   *
   * @param TariffValues $tariff
   */
  public function deleteTariff(TariffValues $tariff)
  {
    $I = $this->I;
    $I->waitForText('Администрирование');

    $menu = new MenuPage($I);
    $menu->enterTariffs();

    $tariffsGrid = new TariffsGrid($I);
    $tariffsGrid->deleteTariff($tariff);
  }

  /**
   * Смена статуса процедуры
   *
   * @param ProcedureValues $procedureValues
   * @param LotChangeValues $lotChangeValues
   */
  public function returnProcedureToPreviousStage(ProcedureValues $procedureValues, LotChangeValues $lotChangeValues)
  {
    $I = $this->I;
    $I->waitForText('Администрирование');

    $menu = new MenuPage($I);
    $menu->enterProceduresGrid();

    $proceduresGrid = new ProceduresGrid($I);
    $proceduresGrid->enterReturnProcedureToPreviousStage($procedureValues);

    $window = new ReturnProcedureToPreviousStageWindow($I);
    $window->returnProcedureToPreviousStage($lotChangeValues);
  }
}