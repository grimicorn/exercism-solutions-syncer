<?php

class Clock
{
    protected $totalMinutes;
    protected $hoursInDay = 24;
    protected $minutesInHour = 60;


    public function __construct($hours, $minutes = 0)
    {
        $this->totalMinutes = $this->calculateTotalMinutes($hours, $minutes);
    }

    public function add($minutes)
    {
        $this->totalMinutes = $this->totalMinutes + intval($minutes);

        return $this;
    }

    public function sub($minutes)
    {
        $this->totalMinutes = $this->totalMinutes - intval($minutes);

        return $this;
    }

    protected function hours()
    {
        $hours = $this->totalMinutes / $this->minutesInHour;

        return floor($hours % $this->hoursInDay);
    }

    protected function minutes()
    {
        $minutes = $this->totalMinutes - ($this->hours() * $this->minutesInHour);

        return $minutes % $this->minutesInHour;
    }

    public function __toString()
    {
        $date = new DateTime;
        $date->setTime($this->hours(), $this->minutes());

        return $date->format('H:i');
    }

    protected function calculateTotalMinutes($hours, $minutes)
    {
        $minutesInDay = $this->hoursInDay * $this->minutesInHour;
        $hours = intval($hours) % $this->hoursInDay;
        $minutes = intval($minutes);
        $totalMinutes = ($hours * $this->minutesInHour) + $minutes;

        // Handle negative minutes to allow for wrap around.
        if ($totalMinutes < 0) {
            $totalMinutes = $totalMinutes + $minutesInDay;
        }

        // Handle day overflow to allow wrap around.
        if ($totalMinutes > $minutesInDay) {
            $totalDays = $totalMinutes / $minutesInDay;
            $totalMinutes = ($totalDays - floor($totalDays)) * $minutesInDay;
        }

        return $totalMinutes;
    }
}
