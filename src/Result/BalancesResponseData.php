<?php

namespace Opay\Result;

use JsonSerializable;
use stdClass;

class BalancesResponseData implements JsonSerializable
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

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }


}