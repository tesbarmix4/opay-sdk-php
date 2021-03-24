<?php


namespace Opay\Result;


use stdClass;

class BalancesResponseData
{
    private $value;
    private $currency;

    /**
     * @param BalancesResponseData $destination
     * @param stdClass|null $source
     * @return BalancesResponseData
     */
    public static function cast(BalancesResponseData $destination, ?stdClass $source): BalancesResponseData
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

    public function toArray(): array
    {
        return (array)$this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }


}