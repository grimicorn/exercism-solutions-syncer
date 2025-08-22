<?php

class PhoneNumber
{
    protected $number;

    public function __construct($number)
    {
        $this->setNumber($number);
    }

    public function setNumber($number)
    {
        $this->number = $this->validate($number)->format($number);

        return $this;
    }

    public function number()
    {
        return $this->number;
    }

    public function areaCode()
    {
        return substr($this->number(), 0, 3);
    }

    public function prettyPrint()
    {
        $areaCode = substr($this->number(), 0, 3);
        $segment1 = substr($this->number(), 3, 3);
        $segment2 = substr($this->number(), 6, 4);

        return "({$areaCode}) {$segment1}-{$segment2}";
    }

    protected function format($number)
    {
        $number = preg_replace('/[^0-9]/u', '', $number);

        if (strlen($number) === 11) {
            $number = preg_replace('/^1/u', '', $number);
        }

        return $number;
    }

    protected function validate($number)
    {
        $number = preg_replace('/[^a-zA-Z0-9]/u', '', $number);

        if (!is_numeric($number)) {
            throw new InvalidArgumentException;
        }

        if (strlen($number) <= 9 or strlen($number) > 11) {
            throw new InvalidArgumentException;
        }

        if (strlen($number) === 11 and strpos($number, '1') !== 0) {
            throw new InvalidArgumentException;
        }

        return $this;
    }
}
