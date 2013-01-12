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

    protected $parser;

    protected function setUp() {
        $this->parser = new EDIParser(__DIR__ . "/JCLInvrpt_short.edi");
        $this->parser->parse();
    }

    public function testParseINVRPT() {
        $this->assertAttributeInstanceOf("\\EDIParser\\Messages\\INVRPT", "oMessage", $this->parser);
        $this->assertAttributeInstanceOf("\\EDIParser\\Fields\\UNB", "UNB", $this->parser);
        $this->assertAttributeInstanceOf("\\EDIParser\\Fields\\UNH", "UNH", $this->parser);
        $this->assertAttributeInstanceOf("\\EDIParser\\Fields\\UNT", "UNT", $this->parser);
        $this->assertAttributeInstanceOf("\\EDIParser\\Fields\\UNZ", "UNZ", $this->parser);

        $message = $this->parser->getOMessage();
        $this->assertAttributeCount(6, "aSegments", $message);
        $this->assertAttributeCount(6, "aLineItems", $message);
    }

}
