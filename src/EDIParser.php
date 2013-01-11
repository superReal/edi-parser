<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moritzkroeger
 * Date: 10.01.13
 * Time: 16:38
 * To change this template use File | Settings | File Templates.
 */ 
class EDIParser
{

    protected $sData;
    protected $oMessage;
    protected $sType;
    protected $UNB, $UNH, $UNT, $UNZ;

    public function __construct($path) {
        $this->sData = file_get_contents($path);
        if (!$this->sData) {
            throw new InvalidArgumentException("No File found or no data present.");
        }
    }

    public function parse() {
        $aS = str_split(substr($this->sData, 0, 9));

        $delimiters = array();
        $delimiters['sT'] = $aS[8];     //'
        $delimiters['cS'] = $aS[3];     //:
        $delimiters['eS'] = $aS[4];     //+
        $delimiters['rI'] = $aS[6];     //?

        $envelopeDataFields = array('UNB', 'UNH', 'UNT', 'UNZ');

        $aSegments = array();
        foreach(explode($delimiters['sT'], $this->sData) as $sSegment) {
            if ($sSegment != "") {
                $oSegment = new Segment($sSegment, $delimiters);
                $sIdentifier = $oSegment->getIdentifier();
                if (in_array($sIdentifier, $envelopeDataFields)) {
                    $this->$sIdentifier = new $sIdentifier($oSegment);
                } elseif ($sIdentifier != "UNA") {
                    array_push($aSegments, $oSegment);
                }
            }
        }

        $this->sType = $this->UNH->getMessageType();

        $class = new ReflectionClass($this->sType);
        $this->oMessage = $class->newInstanceArgs(array($aSegments));
    }
}
