<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moritzkroeger
 * Date: 11.01.13
 * Time: 12:22
 * To change this template use File | Settings | File Templates.
 */

namespace EDIParser\Fields;

class UNZ extends \EDIParser\Elements\SegmentDecorator
{
    public function getMessageCount() {
        return $this->getElement(1,0);
    }

    public function getMessageControlReference() {
        return $this->getElement(2,0);
    }
}
