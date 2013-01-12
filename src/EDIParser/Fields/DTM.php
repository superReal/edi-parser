<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moritzkroeger
 * Date: 11.01.13
 * Time: 16:27
 * To change this template use File | Settings | File Templates.
 */

namespace EDIParser\Fields;

class DTM extends \EDIParser\Elements\SegmentDecorator {

    public function getDateQualifier() {
        return $this->getElement(1,0);
    }

    public function getDate() {
        return $this->getElement(1,1);
    }

    public function getFormatQualifier() {
        return $this->getElement(1,2);
    }

}
