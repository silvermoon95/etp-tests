<?php
/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 07.01.2018
 * Time: 5:30
 */

namespace Page\Values;

/**
 * Значения для создания тарифа
 *
 * Class TariffValues
 * @package Page\Values
 */
class TariffValues
{
  /**
   * @var $active boolean
   */
  protected $active;

  /**
   * @var $name string
   */
  protected $name;

  /**
   * @var $description string
   */
  protected $description;

  /**
   * @var $code string
   */
  protected $code;

  /**
   * @var $price string
   */
  protected $price;

  /**
   * @var $tariffValidityPeriod string
   */
  protected $tariffValidityPeriod;

  /**
   * @var $purchaseCurrency string
   */
  protected $purchaseCurrency;

  /**
   * @var $purchaseReason string
   */
  protected $purchaseReason;

  /**
   * TariffValues constructor.
   * @param bool $active
   * @param string $name
   * @param string $description
   * @param string $code
   * @param string $price
   * @param string $tariffValidityPeriod
   * @param string $purchaseCurrency
   * @param string $purchaseReason
   */
  public function __construct($active, $name, $description, $code, $price, $tariffValidityPeriod, $purchaseCurrency, $purchaseReason)
  {
    $this->active = $active;
    $this->name = $name;
    $this->description = $description;
    $this->code = $code;
    $this->price = $price;
    $this->tariffValidityPeriod = $tariffValidityPeriod;
    $this->purchaseCurrency = $purchaseCurrency;
    $this->purchaseReason = $purchaseReason;
  }

  /**
   * @return bool
   */
  public function isActive()
  {
    return $this->active;
  }

  /**
   * @param bool $active
   */
  public function setActive($active)
  {
    $this->active = $active;
  }

  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @param string $name
   */
  public function setName($name)
  {
    $this->name = $name;
  }

  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * @param string $description
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }

  /**
   * @return string
   */
  public function getCode()
  {
    return $this->code;
  }

  /**
   * @param string $code
   */
  public function setCode($code)
  {
    $this->code = $code;
  }

  /**
   * @return string
   */
  public function getPrice()
  {
    return $this->price;
  }

  /**
   * @param string $price
   */
  public function setPrice($price)
  {
    $this->price = $price;
  }

  /**
   * @return string
   */
  public function getTariffValidityPeriod()
  {
    return $this->tariffValidityPeriod;
  }

  /**
   * @param string $tariffValidityPeriod
   */
  public function setTariffValidityPeriod($tariffValidityPeriod)
  {
    $this->tariffValidityPeriod = $tariffValidityPeriod;
  }

  /**
   * @return string
   */
  public function getPurchaseCurrency()
  {
    return $this->purchaseCurrency;
  }

  /**
   * @param string $purchaseCurrency
   */
  public function setPurchaseCurrency($purchaseCurrency)
  {
    $this->purchaseCurrency = $purchaseCurrency;
  }

  /**
   * @return string
   */
  public function getPurchaseReason()
  {
    return $this->purchaseReason;
  }

  /**
   * @param string $purchaseReason
   */
  public function setPurchaseReason($purchaseReason)
  {
    $this->purchaseReason = $purchaseReason;
  }

}