edi-parser
==========

This is a parser for [UN/EDIFACT](https://de.wikipedia.org/wiki/EDIFACT) messages.

## Usage

To parse a message initialize a new EDIParser Instance with a path to the file you want to parse.
```php
//To
$parser = new EDIParser(__DIR__ . "/PAORES.edi");
$parser->parse();
```

To retrieve the parsed message call:
```php
$oMessage = $parser->getOMessage();
```

#INVRPT (Inventory report message)

The only message type implemented at the moment is [INVRPT](http://www.unece.org/trade/untdid/d08a/trmd/invrpt_c.htm).

An INVRPT basically consists of several LINE ITEM Elements ([LIN](http://www.unece.org/trade/untdid/d08a/trsd/trsdlin.htm)), each followed by a QUANTITY Element ([QTY](http://www.unece.org/trade/untdid/d08a/trsd/trsdqty.htm)).

Example:   
```php
foreach($this->oMessage->getLineItems() as $oLineItem) {
    if (in_array($oLineItem->getItemNumber(), array_keys($aVariantIds))) {
        $aStockChanges[] = array(
            'OXID'      => $aVariantIds[$oLineItem->getItemNumber()],
            'OXSTOCK'   => $oLineItem->getQuantity()
        );

        $aParentChanges[] = array(
            'OXID'      => $aParentIds[$oLineItem->getItemNumber()]
        );
    }
}
```

To retrieve the Line Items from the Message call:
```php
$oMessage->getLineItems();
```

Methods available on Line Item Objects (LIN) to ease access to parsed data:
```php
$oLIN->getLineItemNumber();
$oLIN->getActionRequest();
$oLIN->getItemNumber();
$oLIN->getItemNumberType();
$oLIN->getQuantityQualifier();
$oLIN->getQuantity();
$oLIN->getMeasureUnit();
```