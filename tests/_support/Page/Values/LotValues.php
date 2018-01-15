<?php
/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 10.01.2018
 * Time: 22:03
 */

namespace Page\Values;


class LotValues
{
  //Лот 1/Предмет договора
  /**
   * @var $subjectOfContract string
   */
  protected $subjectOfContract;

  /**
   * @var $reasonForAbsenceOfInitialPrice string
   */
  protected $reasonForAbsenceOfInitialPrice;

  /**
   * @var $classifierOKPD2 string
   */
  protected $classifierOKPD2;

  /**
   * @var $classifierOKVAD2 string
   */
  protected $classifierOKVAD2;

  /**
   * @var $nameOfProduct string
   */
  protected $nameOfProduct;

  /**
   * LotValues constructor.
   * @param string $subjectOfContract
   * @param string $reasonForAbsenceOfInitialPrice
   * @param string $classifierOKPD2
   * @param string $classifierOKVAD2
   * @param string $nameOfProduct
   */
  public function __construct($subjectOfContract, $reasonForAbsenceOfInitialPrice, $classifierOKPD2, $classifierOKVAD2, $nameOfProduct)
  {
    $this->subjectOfContract = $subjectOfContract;
    $this->reasonForAbsenceOfInitialPrice = $reasonForAbsenceOfInitialPrice;
    $this->classifierOKPD2 = $classifierOKPD2;
    $this->classifierOKVAD2 = $classifierOKVAD2;
    $this->nameOfProduct = $nameOfProduct;
  }

  /**
   * @return string
   */
  public function getSubjectOfContract()
  {
    return $this->subjectOfContract;
  }

  /**
   * @param string $subjectOfContract
   */
  public function setSubjectOfContract($subjectOfContract)
  {
    $this->subjectOfContract = $subjectOfContract;
  }

  /**
   * @return string
   */
  public function getReasonForAbsenceOfInitialPrice()
  {
    return $this->reasonForAbsenceOfInitialPrice;
  }

  /**
   * @param string $reasonForAbsenceOfInitialPrice
   */
  public function setReasonForAbsenceOfInitialPrice($reasonForAbsenceOfInitialPrice)
  {
    $this->reasonForAbsenceOfInitialPrice = $reasonForAbsenceOfInitialPrice;
  }

  /**
   * @return string
   */
  public function getClassifierOKPD2()
  {
    return $this->classifierOKPD2;
  }

  /**
   * @param string $classifierOKPD2
   */
  public function setClassifierOKPD2($classifierOKPD2)
  {
    $this->classifierOKPD2 = $classifierOKPD2;
  }

  /**
   * @return string
   */
  public function getClassifierOKVAD2()
  {
    return $this->classifierOKVAD2;
  }

  /**
   * @param string $classifierOKVAD2
   */
  public function setClassifierOKVAD2($classifierOKVAD2)
  {
    $this->classifierOKVAD2 = $classifierOKVAD2;
  }

  /**
   * @return string
   */
  public function getNameOfProduct()
  {
    return $this->nameOfProduct;
  }

  /**
   * @param string $nameOfProduct
   */
  public function setNameOfProduct($nameOfProduct)
  {
    $this->nameOfProduct = $nameOfProduct;
  }


}