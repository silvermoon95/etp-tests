<?php
/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 08.01.2018
 * Time: 2:51
 */

namespace Step;


use Page\CreateProcedureWindow;
use Page\MenuPage;
use Page\ProceduresGrid;
use Page\Values\ApplicationValues;
use Page\Values\ProcedureValues;

/**
 * Заказчик
 *
 * Class Customer
 * @package Step
 */
class Customer extends User
{
  protected $username = 'Диксон';
  protected $password = '123';

  /**
   * Создание процедуры
   *
   * @param ProcedureValues $procedureValues
   */
  public function createProcedure(ProcedureValues $procedureValues) {
    $I = $this->I;

    $I->waitForText('Регистрация в качестве: организатора, заказчика');
    $menu = new MenuPage($I);
    $menu->enterCreateProcedure();

    $procedureWindow = new CreateProcedureWindow($I);
    $procedureWindow->createProcedure($procedureValues);
  }

  /**
   * Проверка значений созданной процедуры
   *
   * @param ProcedureValues $procedureValues
   */
  public function checkProcedureValues(ProcedureValues $procedureValues) {
    $I = $this->I;

    $proceduresGrid = new ProceduresGrid($I);
    $proceduresGrid->viewProcedureNotification($procedureValues);
  }

  /**
   * Проверка значений поданной заявки (лот должен быть на подведении итогов)
   *
   * @param ProcedureValues $procedureValues
   * @param ApplicationValues $applicationValues
   */
  public function checkApplicationValues(ProcedureValues $procedureValues, ApplicationValues $applicationValues)
  {
    $I = $this->I;

    $proceduresGrid = new ProceduresGrid($I);
    $proceduresGrid->viewSubmittedApplications($procedureValues, $applicationValues);
  }
}