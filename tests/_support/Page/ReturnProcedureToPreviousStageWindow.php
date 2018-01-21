<?php
/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 18.01.2018
 * Time: 20:36
 */

namespace Page;


use AcceptanceTester;
use Codeception\Util\Locator;
use Page\Values\LotChangeValues;

/**
 * Форма смены статуса лота (админ)
 *
 * Class ReturnProcedureToPreviousStageWindow
 * @package Page
 */
class ReturnProcedureToPreviousStageWindow
{
  const STATUS_FIELD = 'input[name="status"]+input';
  const STATUS_VARIANT = 'div.x-combo-list-item';
  const BASIS_LOT_CHANGE_FIELD = 'textarea[name="basis_of_lot_change"]';
  const REESTABLISH_BUTTON = 'Восстановить';

  private $I;

  public function __construct(AcceptanceTester $I)
  {
    $this->I = $I;
  }

  /**
   * Заполнить значения для смены статуса и сменить статус
   *
   * @param LotChangeValues $lotChangeValues
   */
  public function returnProcedureToPreviousStage(LotChangeValues $lotChangeValues)
  {
    $I = $this->I;

    $I->click(self::STATUS_FIELD);
    $I->waitForText($lotChangeValues->getStatus());
    $I->click(Locator::contains(self::STATUS_VARIANT, $lotChangeValues->getStatus()));
    $I->fillField(self::BASIS_LOT_CHANGE_FIELD, $lotChangeValues->getBasisLotChange());
    $I->click(self::REESTABLISH_BUTTON);
    $I->waitForText('Восстановление лота');
    $I->click('Подписать');
    $I->waitForText('Лот восстановлен успешно.');
    $I->click('OK');
  }

}