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

/**
 * Упрощенный грид этапов проведения процедуры
 *
 * Class StagesDateTimeGrid
 * @package Page
 */
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

  /**
   * Заполнить значения для двух этапов проведения процедуры
   *
   * @param ProcedureValues $values
   */
  public function fillStagesDates(ProcedureValues $values)
  {
    $I = $this->I;

    // для редактирования значений в гриде нужно нажать по ячейке, дождаться появления поля для ввода, ввести значение и нажать Enter
    $this->fillCellValue(self::EXPIRATION_DATE_FOR_ACCEPTING_APPLICATIONS_FIELD, self::DATE_INPUT, $values->getExpirationDateForAcceptingApplications());
    $this->fillCellValue(self::EXPIRATION_TIME_FOR_ACCEPTING_APPLICATIONS_FIELD, self::TIME_INPUT, $values->getExpirationTimeForAcceptingApplications());
    $this->fillCellValue(self::EXPIRATION_DATE_FOR_SUMMARIZING_FIELD, self::DATE_INPUT, $values->getExpirationDateForSummarizing());
    $this->fillCellValue(self::EXPIRATION_TIME_FOR_SUMMARIZING_FIELD, self::TIME_INPUT, $values->getExpirationTimeForSummarizing());
  }

  private function fillCellValue($cell, $input, $value)
  {
    $I = $this->I;

    $I->click($cell);
    $I->waitForElement($input);
    $I->wait(1);
    $I->fillField($input, $value);
    $I->pressKey($input, WebDriverKeys::ENTER);
    $I->wait(1);
  }

}