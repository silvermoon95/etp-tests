<?php
/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 10.01.2018
 * Time: 22:37
 */

namespace Page;


use AcceptanceTester;
use Codeception\Util\Locator;
use Page\Values\ProcedureValues;

class CreateProcedureWindow
{
  const PURCHASE_NUMBER_FIELD = 'input[name="procedure_number2"]';
  const PURCHASE_NAME_FIELD = 'textarea[name="title"]';
  const TRANSFER_TO_OOS_CHECKBOX = 'input[name="send_to_oos"]';
  const DESCRIPTION_OF_DOCUMENT = 'input.fileDescrCt';
  const PATH_TO_FILE_BUTTON = 'input[type="file"]';
  const SIGNATURE_TEXT_ELEMENT = 'textarea[name="signature_text"]';

  private $I;

  public function __construct(AcceptanceTester $I)
  {
    $this->I = $I;
  }

  public function createProcedure(ProcedureValues $procedureValues)
  {
    $I = $this->I;

    $I->fillField(self::PURCHASE_NUMBER_FIELD, $procedureValues->getPurchaseNumber());
    $I->fillField(self::PURCHASE_NAME_FIELD, $procedureValues->getPurchaseName());
    if (!$procedureValues->isTransferToOOS()) {
      $I->click(self::TRANSFER_TO_OOS_CHECKBOX);
    }
    $dateTimeGrid = new StagesDateTimeGrid($I);
    $dateTimeGrid->fillStagesDates($procedureValues);
    $I->fillField(self::DESCRIPTION_OF_DOCUMENT, $procedureValues->getDescriptionOfDocument());
    $I->attachFile(self::PATH_TO_FILE_BUTTON, $procedureValues->getPathToFile());
    $I->click('Лот 1');
    $I->click('Предмет договора');
    $createLotWindow = new CreateLotWindow($I);
    $createLotWindow->createLotValues($procedureValues->getLotValues());
    $I->click('Подписать и опубликовать');
    if (!$procedureValues->isTransferToOOS()) {
      $I->waitForText('Предупреждение');
      $I->click('Да');
    }
    $I->waitForText('Внимательно перечитайте и проверьте подписываемые данные');
    $I->waitForElement(self::SIGNATURE_TEXT_ELEMENT);
    $I->wait(3);
    $I->click('Подписать');
    $I->waitForText('Документы и сведения направлены успешно');
    $I->click('OK');
    $I->waitForText($procedureValues->getPurchaseName());
  }
}