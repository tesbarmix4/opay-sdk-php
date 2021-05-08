<?php


namespace Opay\Result;


class TransactionInputDobResponseData extends TransactionInputResponseData implements \JsonSerializable
{

    public static function cast(TransactionInputDobResponseData $destination, ?\stdClass $source): TransactionInputDobResponseData
    {
        if ($source) {
            $sourceReflection = new \ReflectionObject($source);
            $sourceProperties = $sourceReflection->getProperties();
            foreach ($sourceProperties as $sourceProperty) {
                $name = $sourceProperty->getName();
                $destination->{$name} = $source->$name;
            }
        }
        return $destination;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        foreach ($this as $key => $val) {
            if ($val !== null) $data[$key] = $val;
        }
        return $data;
    }

    public function toArray(): array
    {
        return (array)$this;
    }
}