<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moritzkroeger
 * Date: 11.01.13
 * Time: 15:51
 * See http://www.unece.org/trade/untdid/d13b/trmd/invrpt_c.htm for details concerning this message type
 */

namespace EDIParser\Messages;

class INVRPT {

    /**
     * Allowed fields for this message type
     * @var array
     */
    protected $aAllowedfields = array('BGM', 'NAD', 'DTM', 'LIN', 'QTY');
    /**
     * Segments
     * @var array
     */
    protected $aSegments;
    /**
     * Array of Fields\LIN Objects
     * @var array
     */
    protected $aLineItems;

    /**
     * Construct this message with an array of parsed segments
     * @param $aSegments array
     */
    public function __construct($aSegments) {
        $this->aSegments = array();
        $this->aLineItems = array();

        foreach($aSegments as $sKey => $oSegment) {
            $sIdentifier = $oSegment->getIdentifier();
            if (in_array($sIdentifier, $this->aAllowedfields)) {
                if ($sIdentifier == 'LIN') {
                    array_push($this->aLineItems, new \EDIParser\Fields\LIN($oSegment, new \EDIParser\Fields\QTY($aSegments[$sKey+1])));
                } elseif ($sIdentifier != 'QTY') {
                    $sClassname = "\\EDIParser\\Fields\\".$sIdentifier;
                    array_push($this->aSegments, new $sClassname($oSegment));
                }
            }
        }
    }

    /**
     * Return Segments
     * @return array
     */
    public function getSegments() {
        return $this->aSegments;
    }

    /**
     * Array of parsed Fields\LIN Objects
     * @return array
     */
    public function getLineItems() {
        return $this->aLineItems;
    }
}
