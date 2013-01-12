<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moritzkroeger
 * Date: 11.01.13
 * Time: 12:26
 * To change this template use File | Settings | File Templates.
 */

namespace EDIParser\Elements;

abstract class SegmentDecorator implements SegmentInterface
{
    protected $segment;

    public function __construct(SegmentInterface $segment) {
        $this->segment = $segment;
    }

    public function getComposite($iCompositeIdx) {
        return $this->segment->getComposite($iCompositeIdx);
    }

    public function getElement($iCompositeIdx, $iElementIdx) {
        return $this->segment->getElement($iCompositeIdx, $iElementIdx);
    }

    public function getIdentifier() {
        return $this->segment->getIdentifier();
    }
}
