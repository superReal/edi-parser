<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moritzkroeger
 * Date: 11.01.13
 * Time: 16:26
 * To change this template use File | Settings | File Templates.
 */

namespace EDIParser\Fields;

class NAD extends \EDIParser\Elements\SegmentDecorator {

    public function getPartyQualifier() {
        return $this->getElement(1,0);
    }

    public function getPartyIdentification() {
        return $this->getElement(2,0);
    }

    public function getCodeListQualifier() {
        return $this->getElement(2,1);
    }

    public function getCodeListResponsibleAgency() {
        return $this->getElement(2,2);
    }

}
