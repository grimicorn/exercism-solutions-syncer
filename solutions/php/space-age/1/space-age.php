<?php

class SpaceAge
{
    protected $seconds;
    protected $secondsInYear = 31557600;

    public function __construct(float $seconds)
    {
        $this->seconds = $seconds;
    }


    public function seconds()
    {
        return $this->seconds;
    }

    public function earth()
    {
        return $this->seconds() / $this->secondsInYear;
    }

    public function mercury()
    {
        return $this->toEarth(0.2408467);
    }

    public function venus()
    {
        return $this->toEarth(0.61519726);
    }

    public function mars()
    {
        return $this->toEarth(1.8808158);
    }

    public function jupiter()
    {
        return $this->toEarth(11.862615);
    }

    public function saturn()
    {
        return $this->toEarth(29.447498);
    }

    public function uranus()
    {
        return $this->toEarth(84.016846);
    }

    public function neptune()
    {
        return $this->toEarth(164.79132);
    }

    protected function toEarth(float $years)
    {
        return $this->earth() / $years;
    }
}
