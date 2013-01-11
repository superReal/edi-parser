<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moritzkroeger
 * Date: 11.01.13
 * Time: 16:26
 * To change this template use File | Settings | File Templates.
 */ 
class LIN extends SegmentDecorator {

    public $oQTY;

    public function __construct(SegmentInterface $oSegment, QTY $oQTY) {
        $this->oQTY = $oQTY;
        parent::__construct($oSegment);
    }

    public function getLineItemNumber() {
        return $this->getElement(1,0);
    }

    public function getActionRequest() {
        return $this->getElement(2,0);
    }

    public function getItemNumber() {
        return $this->getElement(3,0);
    }

    public function getItemNumberType() {
        return $this->getElement(3,1);
    }

}
