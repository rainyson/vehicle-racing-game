<?php

namespace Rainyson\VehicleRacingGame\Classes;

use Rainyson\VehicleRacingGame\Interfaces\SpeedUnit;

class KmhSpeedUnit implements SpeedUnit
{
    /**
     * convert other speed unit to km/h unit
     *
     * @param int $speed
     * @param string $from
     * @return float|int
     */
    public function apply(int $speed, string $from)
    {
        switch ($from) {
            case 'knots':
            case 'Kts':
                $speed *= 1.852;
        }
        return $speed;
    }
}