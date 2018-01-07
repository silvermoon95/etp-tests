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
}