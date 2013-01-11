<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moritzkroeger
 * Date: 11.01.13
 * Time: 12:23
 * To change this template use File | Settings | File Templates.
 */ 
class UNH extends SegmentDecorator
{
    public function getMessageReferenceNumber() {
        return $this->getElement(1,0);
    }

    public function getMessageType() {
        return $this->getElement(2,0);
    }

    public function getMessageVersionNumber() {
        return $this->getElement(2,1);
    }

    public function getMessageReleaseNumber() {
        return $this->getElement(2,2);
    }

    public function getControllingAgency() {
        return $this->getElement(2,3);
    }

    public function getAssociationAssignedCode() {
        return $this->getElement(2,4);
    }
}
