<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moritzkroeger
 * Date: 11.01.13
 * Time: 12:22
 * To change this template use File | Settings | File Templates.
 */ 
class UNB extends SegmentDecorator
{

    public function getSyntaxIdentifier() {
        return $this->getElement(1,0);
    }

    public function getSyntaxVersionNumber() {
        return $this->getElement(1,1);
    }

    public function getSender() {
        return $this->getElement(2,0);
    }

    public function getRecipient() {
        return $this->getElement(3,0);
    }

    public function getDateTime() {
        $date = str_split($this->getElement(4,0), 2);
        $time = str_split($this->getElement(4,1), 2);
        return new DateTime(($date[0]+2000)."-".$date[1]."-".$date[2]." ".$time[0].":".$time[1].":00");
    }

}
