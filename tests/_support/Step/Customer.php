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
use Page\Values\ProcedureValues;

class Customer extends User
{
  protected $username = 'Диксон';
  protected $password = '123';

  public function createProcedure(ProcedureValues $procedureValues) {
    $I = $this->I;

    $I->waitForText('Регистрация в качестве: организатора, заказчика');
    $menu = new MenuPage($I);
    $menu->enterCreateProcedure();

    $procedureWindow = new CreateProcedureWindow($I);
    $procedureWindow->createProcedure($procedureValues);
  }

  public function checkProcedureValues(ProcedureValues $procedureValues) {
    $I = $this->I;

    $proceduresGrid = new ProceduresGrid($I);
    $proceduresGrid->viewProcedureNotification($procedureValues);
  }
}