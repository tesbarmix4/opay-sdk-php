<?php


namespace Opay\Result;


class TransactionInputDobResponseData extends TransactionInputResponseData
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

}