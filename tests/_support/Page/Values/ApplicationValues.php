<?php
/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 17.01.2018
 * Time: 1:40
 */

namespace Page\Values;


class ApplicationValues
{
  //Заявка на участие

  /**
   * @var $supplierName string
   */
  protected $supplierName;

  /**
   * @var $legalAddressOfProcurementParticipant string
   */
  protected $legalAddressOfProcurementParticipant;

  /**
   * @var $quantity string
   */
  protected $quantity;

  /**
   * @var $descriptionOfDocument string
   */
  protected $descriptionOfDocument;

  /**
   * @var $pathToFile string
   */
  protected $pathToFile;

  /**
   * @var $priceWithNDS string
   */
  protected $priceWithNDS;

  /**
   * ApplicationValues constructor.
   * @param string $legalAddressOfProcurementParticipant
   * @param string $quantity
   * @param string $descriptionOfDocument
   * @param string $pathToFile
   * @param string $priceWithNDS
   * @param null|string $supplierName
   */
  public function __construct($legalAddressOfProcurementParticipant, $quantity, $descriptionOfDocument, $pathToFile, $priceWithNDS, $supplierName = null)
  {
    $this->legalAddressOfProcurementParticipant = $legalAddressOfProcurementParticipant;
    $this->quantity = $quantity;
    $this->descriptionOfDocument = $descriptionOfDocument;
    $this->pathToFile = $pathToFile;
    $this->priceWithNDS = $priceWithNDS;
    $this->supplierName = $supplierName;
  }

  /**
   * @return string
   */
  public function getLegalAddressOfProcurementParticipant()
  {
    return $this->legalAddressOfProcurementParticipant;
  }

  /**
   * @param string $legalAddressOfProcurementParticipant
   */
  public function setLegalAddressOfProcurementParticipant($legalAddressOfProcurementParticipant)
  {
    $this->legalAddressOfProcurementParticipant = $legalAddressOfProcurementParticipant;
  }

  /**
   * @return string
   */
  public function getQuantity()
  {
    return $this->quantity;
  }

  /**
   * @param string $quantity
   */
  public function setQuantity($quantity)
  {
    $this->quantity = $quantity;
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
   * @return mixed
   */
  public function getPriceWithNDS()
  {
    return $this->priceWithNDS;
  }

  /**
   * @param mixed $priceWithNDS
   */
  public function setPriceWithNDS($priceWithNDS)
  {
    $this->priceWithNDS = $priceWithNDS;
  }

  /**
   * @return string
   */
  public function getSupplierName()
  {
    return $this->supplierName;
  }

  /**
   * @param string $supplierName
   */
  public function setSupplierName($supplierName)
  {
    $this->supplierName = $supplierName;
  }


}