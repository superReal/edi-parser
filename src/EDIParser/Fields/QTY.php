<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moritzkroeger
 * Date: 11.01.13
 * Time: 16:26
 * To change this template use File | Settings | File Templates.
 */

namespace EDIParser\Fields;

class QTY extends \EDIParser\Elements\SegmentDecorator {
    public function getQuantityQualifier() {
        return $this->getElement(1,0);
    }

    public function getQuantity() {
        return $this->getElement(1,1);
    }

    public function getMeasureUnit() {
        return $this->getElement(1,2);
    }
}
