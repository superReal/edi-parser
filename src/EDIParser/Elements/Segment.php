<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moritzkroeger
 * Date: 11.01.13
 * Time: 11:42
 * To change this template use File | Settings | File Templates.
 */

namespace EDIParser\Elements;

class Segment implements SegmentInterface
{

    protected $aComposites;

    public function __construct($sSegment, $delimiters) {
        $this->aComposites = array();

        foreach (explode($delimiters['eS'], $sSegment) as $sComposite) {
            array_push($this->aComposites, new Composite($sComposite, $delimiters));
        }
    }

    public function getComposite($iCompositeIdx) {
        return $this->aComposites[$iCompositeIdx];
    }

    public function getElement($iCompositeIdx, $iElementIdx) {
        return $this->getComposite($iCompositeIdx)->getElement($iElementIdx);
    }

    public function getIdentifier() {
        return $this->getElement(0,0);
    }

}
