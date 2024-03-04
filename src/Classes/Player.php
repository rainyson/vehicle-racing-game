<?php

namespace Rainyson\VehicleRacingGame\Classes;

class Player
{
    private Vehicle $vehicle;
    private string $name;
    private float $time;

    /**
     * Create object with player name
     *
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Player getter
     *
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get player vehicle
     *
     * @return Vehicle
     */
    public function getVehicle(): Vehicle
    {
        return $this->vehicle;
    }

    /**
     * Set player vehicle
     *
     * @param Vehicle $vehicle
     * @return void
     */
    public function setVehicle(Vehicle $vehicle): void
    {
        $this->vehicle = $vehicle;
    }

    /**
     * Get Player race time
     *
     * @return float
     */
    public function getTime(): float
    {
        return $this->time;
    }

    /**
     * Set Player race time
     *
     * @param float $time
     * @return void
     */
    public function setTime(float $time): void
    {
        $this->time = $time;
    }
}