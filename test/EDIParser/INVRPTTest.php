<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moritzkroeger
 * Date: 10.01.13
 * Time: 16:52
 * To change this template use File | Settings | File Templates.
 */

namespace EDIParser;

require_once "PHPUnit/Autoload.php";
require_once "../vendor/autoload.php";

class INVRPTTest extends \PHPUnit_Framework_TestCase
{

    public function testParseINVRPT() {
        $parser = new EDIParser(__DIR__ . "/JCLInvrpt.edi");
        $parser->parse();
    }

}
