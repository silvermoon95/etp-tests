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
use Page\Values\ApplicationValues;
use Page\Values\ProcedureValues;

/**
 * Грид процедур
 *
 * Class ProceduresGrid
 * @package Page
 */
class ProceduresGrid
{

  private $I;

  const PROCEDURE_CELL = 'div.x-grid3-cell-inner';
  const SELECTED_ROW = 'x-grid3-row-selected';

  const VIEW_PROCEDURE_ICON = ['src' => '/ico/applics/announcement.png'];
  const CREATE_APPLICATION_ICON = ['src' => '/ico/applics/create_applic.png'];
  const RETURN_PROCEDURE_TO_PREVIOUS_STAGE = ['src' => '/ico/procedures/replay.png'];
  const SUBMITTED_APPLICATIONS_ICON = ['src' => '/ico/applics/applications.png'];

  public function __construct(AcceptanceTester $I)
  {
    $this->I = $I;
  }

  /**
   * Просмотреть извещение процедуры и проверить соответствие значениям
   *
   * @param ProcedureValues $procedureValues
   */
  public function viewProcedureNotification(ProcedureValues $procedureValues)
  {
    $I = $this->I;
    $this->clickProcedureRow($procedureValues);

    $viewProcedureNotificationImg = Locator::find('img', self::VIEW_PROCEDURE_ICON);
    $viewProcedureNotification = Locator::combine(self::SELECTED_ROW, $viewProcedureNotificationImg);
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

  /**
   * Выделить строку с процедурой
   *
   * @param ProcedureValues $procedureValues
   */
  private function clickProcedureRow(ProcedureValues $procedureValues)
  {
    $procedureCell = Locator::contains(self::PROCEDURE_CELL, $procedureValues->getPurchaseName());
    $this->I->waitForElement($procedureCell);
    $this->I->click($procedureCell);
  }

  /**
   * Войти в форму подачи заявки (поставщик)
   *
   * @param ProcedureValues $procedureValues
   */
  public function enterCreateApplication(ProcedureValues $procedureValues)
  {
    $I = $this->I;
    $I->wait(2);
    $this->clickProcedureRow($procedureValues);

    $createApplicationImg = Locator::find('img', self::CREATE_APPLICATION_ICON);
    $createApplication = Locator::combine(self::SELECTED_ROW, $createApplicationImg);
    $I->waitForElement($createApplication);
    $I->wait(2);
    $I->click($createApplication);
    $I->waitForText('Заявки :: Заявка на участие в процедуре');
  }

  /**
   * Войти в форму смены статуса лота (админ)
   *
   * @param ProcedureValues $procedureValues
   */
  public function enterReturnProcedureToPreviousStage(ProcedureValues $procedureValues)
  {
    $I = $this->I;
    $I->wait(2);
    $this->clickProcedureRow($procedureValues);

    $returnProcedureToPreviousStageImg = Locator::find('img', self::RETURN_PROCEDURE_TO_PREVIOUS_STAGE);
    $returnProcedureToPreviousStage = Locator::combine(self::SELECTED_ROW, $returnProcedureToPreviousStageImg);
    $I->waitForElement($returnProcedureToPreviousStage);
    $I->wait(2);
    $I->click($returnProcedureToPreviousStage);
    $I->waitForText('Возвращение лота в предыдущий статус');
    $I->waitForText($procedureValues->getPurchaseName(), 20);
  }

  /**
   * Войти в форму просмотра поданных заявок и проверить соответствие значений одной из заявок (заказчик)
   *
   * @param ProcedureValues $procedureValues
   * @param ApplicationValues $applicationValues
   */
  public function viewSubmittedApplications(ProcedureValues $procedureValues, ApplicationValues $applicationValues)
  {
    $I = $this->I;
    $this->clickProcedureRow($procedureValues);

    $submittedApplicationsImg = Locator::find('img', self::SUBMITTED_APPLICATIONS_ICON);
    $submittedApplications = Locator::combine(self::SELECTED_ROW, $submittedApplicationsImg);
    $I->wait(2);
    $I->waitForElement($submittedApplications);
    $I->wait(2);

    $I->click($submittedApplications);
    $I->waitForText('Поданные заявки');

    $I->waitForText($applicationValues->getPriceWithNDS());
    $I->see($applicationValues->getSupplierName());
  }
}