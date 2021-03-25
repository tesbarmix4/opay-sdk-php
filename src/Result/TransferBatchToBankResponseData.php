<?php


namespace Opay\Result;


class TransferBatchToBankResponseData
{
    public static function cast(TransferBatchToBankResponseData $destination, ?\stdClass $source): TransferBatchToBankResponseData
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

    public function toArray(): TransferBatchToBankResponseData
    {
        return $this;
    }
}