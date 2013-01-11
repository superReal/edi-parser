<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moritzkroeger
 * Date: 11.01.13
 * Time: 15:51
 * To change this template use File | Settings | File Templates.
 */ 
class INVRPT {

    protected $aAllowedfields = array('BGM', 'NAD', 'DTM', 'LIN', 'QTY');
    protected $aSegments;
    protected $aLineItems;

    public function __construct($aSegments) {
        $this->aSegments = array();
        $this->aLineItems = array();

        foreach($aSegments as $sKey => $oSegment) {
            $sIdentifier = $oSegment->getIdentifier();
            if (in_array($sIdentifier, $this->aAllowedfields)) {
                if ($sIdentifier == 'LIN') {
                    array_push($this->aLineItems, new LIN($oSegment, new QTY($aSegments[$sKey+1])));
                } elseif ($sIdentifier != 'QTY') {
                    array_push($this->aSegments, new $sIdentifier($oSegment));
                }
            }
        }

        var_dump($this->aSegments);
        var_dump($this->aLineItems);
    }

    public function getLineItems() {

    }
}
