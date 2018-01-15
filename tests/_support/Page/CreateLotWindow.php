<?php
/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 11.01.2018
 * Time: 1:27
 */

namespace Page;


use AcceptanceTester;
use Codeception\Util\Locator;
use Page\Values\LotValues;

class CreateLotWindow
{
  const SUBJECT_OF_CONTRACT_FIELD = 'textarea[name="subject"]';
  const REASON_FOR_ABSENCE_OF_INITIAL_PRICE_FIELD = 'textarea[name="no_price_reason"]';
  const SELECT_OKPD2_BUTTON = 'table.okpd_add_btn button';
  const SELECT_OKVAD2_BUTTON = 'table.okved_add_btn button';
  const NAME_OF_PRODUCT_FIELD = 'input[name="name"]';
  const SELECT_REFERENCE_BUTTON = 'table.tree_window_select_btn button';

  private $I;

  public function __construct(AcceptanceTester $I)
  {
    $this->I = $I;
  }

  public function createLotValues(LotValues $lotValues)
  {
    $I = $this->I;

    $I->fillField(self::SUBJECT_OF_CONTRACT_FIELD, $lotValues->getSubjectOfContract());
    $I->fillField(self::REASON_FOR_ABSENCE_OF_INITIAL_PRICE_FIELD, $lotValues->getReasonForAbsenceOfInitialPrice());
    $I->click(self::SELECT_OKPD2_BUTTON);
    $I->waitForText($lotValues->getClassifierOKPD2());
    $I->click($lotValues->getClassifierOKPD2());
    $I->click(self::SELECT_REFERENCE_BUTTON);
    $I->click(self::SELECT_OKVAD2_BUTTON);
    $I->waitForText($lotValues->getClassifierOKVAD2());
    $I->click($lotValues->getClassifierOKVAD2());
    $I->click(self::SELECT_REFERENCE_BUTTON);
    $I->fillField(self::NAME_OF_PRODUCT_FIELD, $lotValues->getNameOfProduct());
  }
}