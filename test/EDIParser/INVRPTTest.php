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
require_once "../../vendor/autoload.php";

class INVRPTTest extends \PHPUnit_Framework_TestCase
{

    static $parser;

    public static function setUpBeforeClass() {
        self::$parser = new EDIParser(__DIR__ . "/JCLInvrpt_short.edi");
        self::$parser->parse();
    }

    public function testParseINVRPT() {
        $this->assertAttributeInstanceOf("\\EDIParser\\Messages\\INVRPT", "oMessage", self::$parser);
        $this->assertAttributeInstanceOf("\\EDIParser\\Fields\\UNB", "UNB", self::$parser);
        $this->assertAttributeInstanceOf("\\EDIParser\\Fields\\UNH", "UNH", self::$parser);
        $this->assertAttributeInstanceOf("\\EDIParser\\Fields\\UNT", "UNT", self::$parser);
        $this->assertAttributeInstanceOf("\\EDIParser\\Fields\\UNZ", "UNZ", self::$parser);

        $message = self::$parser->getOMessage();
        $this->assertAttributeCount(6, "aSegments", $message);
        $this->assertAttributeCount(6, "aLineItems", $message);
    }

}
