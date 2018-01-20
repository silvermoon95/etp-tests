<?php
/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 08.01.2018
 * Time: 2:51
 */

namespace Step;


use Page\CreateApplicationWindow;
use Page\MenuPage;
use Page\ProceduresGrid;
use Page\Values\ApplicationValues;
use Page\Values\ProcedureValues;

class Supplier extends User
{
  protected $username = 'Кокос';
  protected $password = '123';

  public function createApplication(ProcedureValues $procedureValues, ApplicationValues $applicationValues) {
    $I = $this->I;

    $I->waitForText('Регистрация в качестве: участника закупки');
    $menu = new MenuPage($I);
    $menu->enterProceduresGrid();

    $proceduresGrid = new ProceduresGrid($I);
    $proceduresGrid->enterCreateApplication($procedureValues);

    $applicationWindow = new CreateApplicationWindow($I);
    $applicationWindow->createApplication($applicationValues);
  }
}