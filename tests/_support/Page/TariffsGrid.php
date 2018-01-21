<?php
/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 07.01.2018
 * Time: 5:12
 */

namespace Page;


use AcceptanceTester;
use Codeception\Util\Locator;
use Page\Values\TariffValues;

/**
 * Грид "Актуальные тарифы"
 *
 * Class TariffsGrid
 * @package Page
 */
class TariffsGrid
{
  const CREATE_TARIFF = 'Добавить тариф';

  private $I;

  public function __construct(AcceptanceTester $I)
  {
    $this->I = $I;
  }

  /**
   * Открыть форму создания тарифа
   */
  public function openCreateTariffWindow()
  {
    /**
     * @var $I AcceptanceTester
     */
    $I = $this->I;

    $I->see(self::CREATE_TARIFF);
    $I->click(self::CREATE_TARIFF);
    $I->waitForText('Редактирование абонентского тарифа');
  }

  /**
   * Удалить тариф со значениями $values
   *
   * @param TariffValues $values
   */
  public function deleteTariff(TariffValues $values)
  {
    $I = $this->I;

    $tariffCell = Locator::contains('div.x-grid3-cell-inner', $values->getName());
    $I->click($tariffCell);
    $I->click('Удалить');
    $I->waitForText('Предупреждение');
    $I->click('Да');
    $I->waitForElementNotVisible($tariffCell);
  }
}