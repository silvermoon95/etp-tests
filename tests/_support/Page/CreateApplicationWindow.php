<?php
/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 17.01.2018
 * Time: 0:57
 */

namespace Page;


use AcceptanceTester;
use Codeception\Util\Locator;
use Page\Values\ApplicationValues;

/**
 * Форма создания заявки
 *
 * Class CreateApplicationWindow
 * @package Page
 */
class CreateApplicationWindow
{
  const LEGAL_ADDRESS_OF_PROCUREMENT_PARTICIPANT_FIELD = 'input[name="confirmed_address"]+input';
  const LEGAL_ADDRESS_OF_PROCUREMENT_PARTICIPANT_VARIANT = 'div.x-combo-list-item';
  const APPROVE_BUTTON = 'Утвердить';
  const QUANTITY_FIELD = 'input[name="quantity"]';
  const DESCRIPTION_OF_DOCUMENT = 'input.fileDescrCt';
  const PATH_TO_FILE_BUTTON = 'input[type="file"]';
  const PRICE_WITH_NDS_FIELD = 'input[name="price"].application_price_field';
  const CREATE_APPLICATION_BUTTON = 'Подать заявку';
  const SIGNATURE_TEXT_ELEMENT = 'textarea[name="signature_text"]';

  private $I;

  public function __construct(AcceptanceTester $I)
  {
    $this->I = $I;
  }

  /**
   * Создание и подписание заявки
   *
   * @param ApplicationValues $applicationValues
   */
  public function createApplication(ApplicationValues $applicationValues)
  {
    $I = $this->I;

    $I->wait(15);
    $I->click(self::LEGAL_ADDRESS_OF_PROCUREMENT_PARTICIPANT_FIELD);
    $I->waitForText($applicationValues->getLegalAddressOfProcurementParticipant());
    $I->click(Locator::contains(self::LEGAL_ADDRESS_OF_PROCUREMENT_PARTICIPANT_VARIANT, $applicationValues->getLegalAddressOfProcurementParticipant()));
    $I->click(self::APPROVE_BUTTON);
    $I->fillField(self::QUANTITY_FIELD, $applicationValues->getQuantity());
    $I->fillField(self::DESCRIPTION_OF_DOCUMENT, $applicationValues->getDescriptionOfDocument());
    $this->attachFile($applicationValues);
    $I->fillField(self::PRICE_WITH_NDS_FIELD, $applicationValues->getPriceWithNDS());
    $I->click(self::CREATE_APPLICATION_BUTTON);

    $I->waitForText('Внимательно перечитайте и проверьте подписываемые данные');
    $I->waitForElement(self::SIGNATURE_TEXT_ELEMENT);
    $I->wait(3);
    $I->click('Подписать');

    $I->waitForText('Документы и сведения направлены успешно', 20);
    $I->click('OK');
  }

  private function attachFile(ApplicationValues $applicationValues)
  {
    $I = $this->I;
    $I->attachFile(self::PATH_TO_FILE_BUTTON, $applicationValues->getPathToFile());
    $loadingFileLabel = Locator::contains('div', 'Загрузка файла');
    $I->waitForElementVisible($loadingFileLabel);
    $I->waitForElementNotVisible($loadingFileLabel);
  }
}