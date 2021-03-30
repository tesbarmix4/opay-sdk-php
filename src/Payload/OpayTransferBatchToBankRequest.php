<?php


namespace Opay\Payload;


class OpayTransferBatchToBankRequest extends BaseRequest implements \JsonSerializable
{
    private $list;

    /**
     * @return mixed
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @param mixed $list
     */
    public function setList($list): void
    {
        $this->list = $list;
    }

    public function jsonSerialize(): array
    {
        return $this->sort([
            'list' => $this->list
        ]);
    }
}