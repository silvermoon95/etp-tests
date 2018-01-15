<?php
/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 07.01.2018
 * Time: 4:48
 */

namespace Page;


use AcceptanceTester;

class MenuPage
{
  const FINANCES_BUTTON = 'Финансы';
  const TARIFFS_BUTON = 'Абонентские тарифы';

  const PROCEDURES_BUTTON = 'Процедуры';
  const NEW_BUTTON = 'Новая';

  private $I;

  public function __construct(AcceptanceTester $I)
  {
    $this->I = $I;
  }

  public function enterTariffs()
  {
    /**
     * @var $I AcceptanceTester
     */
    $I = $this->I;

    $I->click(self::FINANCES_BUTTON);
    $I->click(self::TARIFFS_BUTON);
    $I->waitForText(TariffsGrid::CREATE_TARIFF);
  }

  public function enterCreateProcedure()
  {
    /**
     * @var $I AcceptanceTester
     */
    $I = $this->I;
    $I->click(self::PROCEDURES_BUTTON);
    $I->click(self::NEW_BUTTON);
    $I->waitForText('Процедуры :: Новая процедура закупки');
  }
}