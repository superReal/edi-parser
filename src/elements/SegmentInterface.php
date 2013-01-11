<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moritzkroeger
 * Date: 11.01.13
 * Time: 12:23
 * To change this template use File | Settings | File Templates.
 */ 
interface SegmentInterface
{
    public function getComposite($iIndex);

    public function getElement($iCompositeIdx, $iElementIdx);

    public function getIdentifier();
}
