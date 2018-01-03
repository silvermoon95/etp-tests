<?php

use Codeception\Util\Locator;

class FindCatsCest
{
    // tests
    public function findCats(AcceptanceTester $I)
    {
      $I->wantToTest('Нахождение котов в Google');

      $I->amOnPage('/');
      $I->waitForElement(Locator::find('img', ['alt' => 'Google']));
      $searchField = Locator::find('input', ['aria-label' => "Найти"]);
      $I->fillField($searchField, 'Котята');
      $I->click('Поиск в Google');
      $I->waitForText('Купить кошек и котят из питомника и частные объявления');
    }
}
