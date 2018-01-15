<?php
/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 10.01.2018
 * Time: 22:59
 */

namespace Page;


use AcceptanceTester;
use Facebook\WebDriver\WebDriverKeys;
use Page\Values\ProcedureValues;

class StagesDateTimeGrid
{
  const EXPIRATION_DATE_FOR_ACCEPTING_APPLICATIONS_FIELD = 'div.row-registration td.x-grid3-td-date_end';
  const EXPIRATION_TIME_FOR_ACCEPTING_APPLICATIONS_FIELD = 'div.row-registration td.x-grid3-td-time_end';
  const EXPIRATION_DATE_FOR_SUMMARIZING_FIELD = 'div.row-second_parts td.x-grid3-td-date_end';
  const EXPIRATION_TIME_FOR_SUMMARIZING_FIELD = 'div.row-second_parts td.x-grid3-td-time_end';
  const DATE_INPUT = 'input.date_editor';
  const TIME_INPUT = 'input.time_editor';


  private $I;

  public function __construct(AcceptanceTester $I)
  {
    $this->I = $I;
  }

  public function fillStagesDates(ProcedureValues $values)
  {
    $I = $this->I;

    $I->click(self::EXPIRATION_DATE_FOR_ACCEPTING_APPLICATIONS_FIELD);
    $I->waitForElement(self::DATE_INPUT);
    $I->fillField(self::DATE_INPUT, $values->getExpirationDateForAcceptingApplications());
    $I->pressKey(self::DATE_INPUT,WebDriverKeys::ENTER);

    $I->click(self::EXPIRATION_TIME_FOR_ACCEPTING_APPLICATIONS_FIELD);
    $I->waitForElement(self::TIME_INPUT);
    $I->fillField(self::TIME_INPUT, $values->getExpirationTimeForAcceptingApplications());

    $I->click(self::EXPIRATION_DATE_FOR_SUMMARIZING_FIELD);
    $I->waitForElement(self::DATE_INPUT);
    $I->fillField(self::DATE_INPUT, $values->getExpirationDateForSummarizing());
    $I->pressKey(self::DATE_INPUT,WebDriverKeys::ENTER);

    $I->click(self::EXPIRATION_TIME_FOR_SUMMARIZING_FIELD);
    $I->waitForElement(self::TIME_INPUT);
    $I->fillField(self::TIME_INPUT, $values->getExpirationTimeForSummarizing());
  }

}