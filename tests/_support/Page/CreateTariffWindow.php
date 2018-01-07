<?php
/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 07.01.2018
 * Time: 5:52
 */

namespace Page;


use AcceptanceTester;
use Codeception\Util\Locator;
use Page\Values\TariffValues;

class CreateTariffWindow
{
  protected $ACTIVE_CHECKBOX;
  const NAME = 'input[name="name"]';
  const DESCRIPTION = 'textarea[name="description"]';
  const CODE = 'input[name="code"]';
  const PRICE = 'input[name="RUB"]';
  const TARIFF_VALIDITY_PERIOD = 'input[name="limit_validity_type"]';
  const TARIFF_VALIDITY_PERIOD_VARIANT = 'div.x-combo-list-item';
  const PURCHASE_CURRENCY = 'input[name="currency_val"]+input';
  const PURCHASE_CURRENCY_VARIANT = 'div.x-combo-list-item';
  const PURCHASE_REASON = 'textarea[name="fee_basis_text"]';

  private $I;

  public function __construct(AcceptanceTester $I)
  {
    $this->I = $I;
    $this->ACTIVE_CHECKBOX = Locator::contains('label.x-form-cb-label', 'Активен');
  }

  public function createTariff(TariffValues $values)
  {
    /**
     * @var $I AcceptanceTester
     */
    $I = $this->I;
    if ($values->isActive()) {
      $I->click($this->ACTIVE_CHECKBOX);
    }
    $I->fillField(self::NAME, $values->getName());
    $I->fillField(self::DESCRIPTION, $values->getDescription());
    $I->fillField(self::CODE, $values->getCode());
    $I->fillField(self::PRICE, $values->getPrice());
    $I->click(self::TARIFF_VALIDITY_PERIOD);
    $I->waitForText($values->getTariffValidityPeriod());
    $I->click(Locator::contains(self::TARIFF_VALIDITY_PERIOD_VARIANT, $values->getTariffValidityPeriod()));
    $I->click(self::PURCHASE_CURRENCY);
    $I->waitForText($values->getPurchaseCurrency());
    $I->click(Locator::contains(self::PURCHASE_CURRENCY_VARIANT, $values->getPurchaseCurrency()));
    $I->fillField(self::PURCHASE_REASON, $values->getPurchaseReason());
    $I->click('Сохранить');
    $I->waitForText('Тариф успешно сохранен');
    $I->click('OK');
    $I->waitForText($values->getName());
  }
}