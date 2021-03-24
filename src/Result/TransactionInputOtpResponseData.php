<?php


namespace Opay\Result;


class TransactionInputOtpResponseData extends TransactionInputResponseData
{

    public static function cast(TransactionInputOtpResponseData $destination, ?\stdClass $source): TransactionInputOtpResponseData
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