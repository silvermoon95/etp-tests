<?php
/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 10.01.2018
 * Time: 1:55
 */

namespace Page\Values;

/**
 * Значения для создания процедуры
 *
 * Class ProcedureValues
 * @package Page\Values
 */
class ProcedureValues
{
  //Общие сведения
  /**
   * @var $purchaseNumber string
   */
  protected $purchaseNumber;

  /**
   * @var $purchaseName string
   */
  protected $purchaseName;

  /**
   * @var $transferToOOS boolean
   */
  protected $transferToOOS;

  /**
   * @var $expirationDateForAcceptingApplications string
   */
  protected $expirationDateForAcceptingApplications;

  /**
   * @var $expirationTimeForAcceptingApplications string
   */
  protected $expirationTimeForAcceptingApplications;

  /**
   * @var $expirationDateForSummarizing string
   */
  protected $expirationDateForSummarizing;

  /**
   * @var $expirationTimeForAcceptingSummarizing string
   */
  protected $expirationTimeForSummarizing;

  /**
   * @var $descriptionOfDocument string
   */
  protected $descriptionOfDocument;

  /**
   * @var $pathToFile string
   */
  protected $pathToFile;

  /**
   * @var $lotValues LotValues
   */
  protected $lotValues;

  /**
   * ProcedureValues constructor.
   * @param string $purchaseNumber
   * @param string $purchaseName
   * @param bool $transferToOOS
   * @param string $expirationDateForAcceptingApplications
   * @param string $expirationTimeForAcceptingApplications
   * @param string $expirationDateForSummarizing
   * @param string $expirationTimeForSummarizing
   * @param string $descriptionOfDocument
   * @param string $pathToFile
   * @param LotValues $lotValues
   */
  public function __construct($purchaseNumber, $purchaseName, $transferToOOS, $expirationDateForAcceptingApplications, $expirationTimeForAcceptingApplications, $expirationDateForSummarizing, $expirationTimeForSummarizing, $descriptionOfDocument, $pathToFile, LotValues $lotValues)
  {
    $this->purchaseNumber = $purchaseNumber;
    $this->purchaseName = $purchaseName;
    $this->transferToOOS = $transferToOOS;
    $this->expirationDateForAcceptingApplications = $expirationDateForAcceptingApplications;
    $this->expirationTimeForAcceptingApplications = $expirationTimeForAcceptingApplications;
    $this->expirationDateForSummarizing = $expirationDateForSummarizing;
    $this->expirationTimeForSummarizing = $expirationTimeForSummarizing;
    $this->descriptionOfDocument = $descriptionOfDocument;
    $this->pathToFile = $pathToFile;
    $this->lotValues = $lotValues;
  }

  /**
   * @return string
   */
  public function getPurchaseNumber()
  {
    return $this->purchaseNumber;
  }

  /**
   * @param string $purchaseNumber
   */
  public function setPurchaseNumber($purchaseNumber)
  {
    $this->purchaseNumber = $purchaseNumber;
  }

  /**
   * @return string
   */
  public function getPurchaseName()
  {
    return $this->purchaseName;
  }

  /**
   * @param string $purchaseName
   */
  public function setPurchaseName($purchaseName)
  {
    $this->purchaseName = $purchaseName;
  }

  /**
   * @return bool
   */
  public function isTransferToOOS()
  {
    return $this->transferToOOS;
  }

  /**
   * @param bool $transferToOOS
   */
  public function setTransferToOOS($transferToOOS)
  {
    $this->transferToOOS = $transferToOOS;
  }

  /**
   * @return string
   */
  public function getExpirationDateForAcceptingApplications()
  {
    return $this->expirationDateForAcceptingApplications;
  }

  /**
   * @param string $expirationDateForAcceptingApplications
   */
  public function setExpirationDateForAcceptingApplications($expirationDateForAcceptingApplications)
  {
    $this->expirationDateForAcceptingApplications = $expirationDateForAcceptingApplications;
  }

  /**
   * @return string
   */
  public function getExpirationTimeForAcceptingApplications()
  {
    return $this->expirationTimeForAcceptingApplications;
  }

  /**
   * @param string $expirationTimeForAcceptingApplications
   */
  public function setExpirationTimeForAcceptingApplications($expirationTimeForAcceptingApplications)
  {
    $this->expirationTimeForAcceptingApplications = $expirationTimeForAcceptingApplications;
  }

  /**
   * @return string
   */
  public function getExpirationDateForSummarizing()
  {
    return $this->expirationDateForSummarizing;
  }

  /**
   * @param string $expirationDateForSummarizing
   */
  public function setExpirationDateForSummarizing($expirationDateForSummarizing)
  {
    $this->expirationDateForSummarizing = $expirationDateForSummarizing;
  }

  /**
   * @return string
   */
  public function getExpirationTimeForSummarizing()
  {
    return $this->expirationTimeForSummarizing;
  }

  /**
   * @param string $expirationTimeForSummarizing
   */
  public function setExpirationTimeForSummarizing($expirationTimeForSummarizing)
  {
    $this->expirationTimeForSummarizing = $expirationTimeForSummarizing;
  }

  /**
   * @return string
   */
  public function getDescriptionOfDocument()
  {
    return $this->descriptionOfDocument;
  }

  /**
   * @param string $descriptionOfDocument
   */
  public function setDescriptionOfDocument($descriptionOfDocument)
  {
    $this->descriptionOfDocument = $descriptionOfDocument;
  }

  /**
   * @return string
   */
  public function getPathToFile()
  {
    return $this->pathToFile;
  }

  /**
   * @param string $pathToFile
   */
  public function setPathToFile($pathToFile)
  {
    $this->pathToFile = $pathToFile;
  }

  /**
   * @return LotValues
   */
  public function getLotValues()
  {
    return $this->lotValues;
  }

  /**
   * @param LotValues $lotValues
   */
  public function setLotValues($lotValues)
  {
    $this->lotValues = $lotValues;
  }


}