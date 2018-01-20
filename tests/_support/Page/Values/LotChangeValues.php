<?php
/**
 * Created by PhpStorm.
 * User: Silvermoon
 * Date: 18.01.2018
 * Time: 20:50
 */

namespace Page\Values;


class LotChangeValues
{
  /**
   * @var $status string
   */
  protected $status;

  /**
   * @var $basisLotChange string
   */
  protected $basisLotChange;

  /**
   * LotChangeValues constructor.
   * @param string $status
   * @param string $basisLotChange
   */
  public function __construct($status, $basisLotChange)
  {
    $this->status = $status;
    $this->basisLotChange = $basisLotChange;
  }

  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }

  /**
   * @param string $status
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }

  /**
   * @return string
   */
  public function getBasisLotChange()
  {
    return $this->basisLotChange;
  }

  /**
   * @param string $basisLotChange
   */
  public function setBasisLotChange($basisLotChange)
  {
    $this->basisLotChange = $basisLotChange;
  }


}