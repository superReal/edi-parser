<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moritzkroeger
 * Date: 11.01.13
 * Time: 11:43
 * To change this template use File | Settings | File Templates.
 */

namespace EDIParser\Elements;

class Composite
{

    protected $aElements;

    public function __construct($sComposite, $delimiters) {
        $this->aElements = explode($delimiters['cS'], $sComposite);
    }

    public function getElement($iElementIdx) {
        return $this->aElements[$iElementIdx];
    }

}
