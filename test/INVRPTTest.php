<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moritzkroeger
 * Date: 10.01.13
 * Time: 16:52
 * To change this template use File | Settings | File Templates.
 */

require "../src/EDIParser.php";
require "../autoload.php";

class INVRPTTest extends PHPUnit_Framework_TestCase
{

    protected $parser;

    protected function setUp() {
        $this->parser = new EDIParser(__DIR__ . "/JCLInvrpt_short.edi");
    }

    public function testParse() {
        $this->parser->parse();
    }

}
