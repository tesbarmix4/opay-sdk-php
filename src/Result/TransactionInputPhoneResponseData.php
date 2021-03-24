<?php


namespace Opay\Result;


class TransactionInputPhoneResponseData extends TransactionInputResponseData
{

    public static function cast(TransactionInputPhoneResponseData $destination, ?\stdClass $source): TransactionInputPhoneResponseData
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