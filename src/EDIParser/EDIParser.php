<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moritzkroeger
 * Date: 10.01.13
 * Time: 16:38
 * To change this template use File | Settings | File Templates.
 */

namespace EDIParser;

class EDIParser
{

    /**
     * unparsed data from file
     * @var string
     */
    protected $sData;
    /**
     * parsed Message Object
     * @var Messages\INVRPT|mixed
     */
    protected $oMessage;
    /**
     * Message type
     * @var string
     */
    protected $sType;
    /**
     * Special Segments
     */
    protected $UNB, $UNH, $UNT, $UNZ;

    /**
     * Construct a new EDIParser Instance
     * Needs a path to to a file that should be parsed
     * @param $path string
     * @throws \InvalidArgumentException
     */
    public function __construct($path) {
        $this->sData = file_get_contents($path);
        $this->sData = str_replace("\n", "", $this->sData);         //Strip Line Breaks
        if (!$this->sData) {
            throw new \InvalidArgumentException("No File found or no data present.");
        }
    }

    /**
     * Parses the file which the instance was initialized
     * @throws EDIParserException
     */
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
                $oSegment = new Elements\Segment($sSegment, $delimiters);
                $sIdentifier = $oSegment->getIdentifier();
                if (in_array($sIdentifier, $envelopeDataFields)) {
                    $sClassname = "\\EDIParser\\Fields\\".$sIdentifier;
                    $this->$sIdentifier = new $sClassname($oSegment);
                } elseif ($sIdentifier != "UNA") {
                    array_push($aSegments, $oSegment);
                }
            }
        }

        $this->sData = NULL;

        try {
            $this->sType = $this->UNH->getMessageType();

            $class = new \ReflectionClass("\\EDIParser\\Messages\\".$this->sType);
            $this->oMessage = $class->newInstanceArgs(array($aSegments));
        } catch (\ReflectionException $e) {
            throw new EDIParserException("Unknown Message Type");
        }
    }

    /**
     * Return Interchange Header
     * @return Fields\UNB
     */
    public function getUNB()
    {
        return $this->UNB;
    }

    /**
     * Return Message Header (http://www.unece.org/trade/untdid/d13b/trsd/trsdunh.htm)
     * @return Fields\UNH
     */
    public function getUNH()
    {
        return $this->UNH;
    }

    /**
     * Return parsed message object.
     * @return Messages\INVRPT|mixed
     */
    public function getOMessage()
    {
        return $this->oMessage;
    }

    /**
     * Returns message Type
     * @return string
     */
    public function getSType()
    {
        return $this->sType;
    }
}
