<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moritzkroeger
 * Date: 12.01.13
 * Time: 15:56
 * To change this template use File | Settings | File Templates.
 */

namespace EDIParser;

require_once "PHPUnit/Autoload.php";
require_once "../../vendor/autoload.php";

class PAORESTest extends \PHPUnit_Framework_TestCase {

    /**
     * @expectedException \EDIParser\EDIParserException
     */
    public function testParsePAORES() {
        $parser = new EDIParser(__DIR__ . "/PAORES.edi");
        $parser->parse();
    }

}
