<?php
/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 11.01.2018
 * Time: 20:14
 */

namespace Page;


use AcceptanceTester;
use Codeception\Util\Locator;
use Page\Values\ProcedureValues;

class ProceduresGrid
{

  private $I;

  public function __construct(AcceptanceTester $I)
  {
    $this->I = $I;
  }

  public function viewProcedureNotification(ProcedureValues $procedureValues)
  {
    $I = $this->I;
    $procedureCell = Locator::contains('div.x-grid3-cell-inner', $procedureValues->getPurchaseName());
    $I->click($procedureCell);
    $viewProcedureNotification = Locator::find('img', ['src'=>'/ico/applics/announcement.png']);
    $I->click($viewProcedureNotification);
    $I->waitForText('Извещение о проведении процедуры');
    $I->waitForText($procedureValues->getPurchaseNumber());
    $I->see($procedureValues->getPurchaseName());
    $I->see($procedureValues->getDescriptionOfDocument());
    $I->see($procedureValues->getExpirationDateForAcceptingApplications().' '.$procedureValues->getExpirationTimeForAcceptingApplications());
    $lotValues = $procedureValues->getLotValues();
    $I->see($lotValues->getSubjectOfContract());
    $I->see($lotValues->getReasonForAbsenceOfInitialPrice());
    $I->see($lotValues->getNameOfProduct());
    $I->see($lotValues->getClassifierOKPD2());
    $I->see($lotValues->getClassifierOKVAD2());

  }
}