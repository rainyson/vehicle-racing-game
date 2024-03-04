<?php

namespace Rainyson\VehicleRacingGame\Classes;

use Rainyson\VehicleRacingGame\Interfaces\SpeedUnit;

class Vehicle
{
    /**
     * Create Vehicle object with vehicle data in vehicles.json file
     *
     * @param $name
     * @param $maxSpeed
     * @param $unit
     * @param $id
     */
    public function __construct(private $name, private $maxSpeed, private $unit, private $id)
    {
    }

    /**
     * Get Vehicle name
     *
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get vehicle max speed
     *
     * @return mixed
     */
    public function getMaxSpeed(): int
    {
        return $this->maxSpeed;
    }

    /**
     * get vehicle unit
     *
     * @return mixed
     */
    public function getUnit(): string
    {
        return $this->unit;
    }

    /**
     * get vehicle id
     *
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Convert vehicle speed with speed unit adapter
     *
     * @param SpeedUnit $speedUnit
     * @return int
     */
    public function convertSpeed(SpeedUnit $speedUnit): int
    {
        return $speedUnit->apply($this->getMaxSpeed(), $this->getUnit());
    }
}