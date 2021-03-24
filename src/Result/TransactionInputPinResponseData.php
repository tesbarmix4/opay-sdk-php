<?php


namespace Opay\Result;


class TransactionInputPinResponseData extends TransactionInputResponseData
{

    public static function cast(TransactionInputPinResponseData $destination, ?\stdClass $source): TransactionInputPinResponseData
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

}