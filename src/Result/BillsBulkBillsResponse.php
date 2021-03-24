<?php


namespace Opay\Result;


use stdClass;

class BillsBulkBillsResponse extends Response
{

    static function parseData(?stdClass $s): BillsBulkBillsResponseData
    {
        return BillsBulkBillsResponseData::cast(new BillsBulkBillsResponseData(), $s);
    }

    public function getData()
    {
        $this->data;
    }
}