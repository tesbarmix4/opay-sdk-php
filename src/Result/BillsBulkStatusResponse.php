<?php


namespace Opay\Result;


use stdClass;

class BillsBulkStatusResponse extends Response
{

    static function parseData(?stdClass $s): BillsBulkStatusResponseData
    {
        return BillsBulkStatusResponseData::cast(new BillsBulkStatusResponseData(), $s);
    }

    public function getData()
    {
        $this->data;
    }
}