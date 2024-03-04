<?php

namespace Rainyson\VehicleRacingGame\Interfaces;

interface SpeedUnit
{
    /**
     * convert vehicle speed to specific unit with speed unit adapters
     *
     * @param int $speed
     * @param string $from
     * @return mixed
     */
    public function apply(int $speed, string $from);
}