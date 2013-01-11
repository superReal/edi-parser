<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moritzkroeger
 * Date: 11.01.13
 * Time: 12:23
 * To change this template use File | Settings | File Templates.
 */ 
class UNT extends SegmentDecorator
{
    public function getSegmentCount() {
        return $this->getElement(1,0);
    }

    public function getMessageReferenceNumber() {
        return $this->getElement(2,0);
    }
}
