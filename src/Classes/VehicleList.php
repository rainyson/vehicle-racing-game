<?php

namespace Rainyson\VehicleRacingGame\Classes;

class VehicleList
{
    private static array $vehiclesList = [];


    /**
     * Get Vehicles List
     *
     * @return array
     */
    public static function getVehiclesList(): array
    {
        return self::$vehiclesList;
    }

    /**
     * Get Vehicles from vehicles.json file and create Object for every vehicle
     *
     * @return void
     */
    public static function setVehiclesList(): void
    {
        $vehicles = json_decode(file_get_contents(__DIR__ . "/../../vehicles.json"), true);
        foreach ($vehicles as $key => $vehicle) {
            self::$vehiclesList[] = new Vehicle($vehicle['name'], $vehicle['maxSpeed'], $vehicle['unit'], $key + 1);
        }

    }

    /**
     * Check vehicle existence by id
     *
     * @param $vehicleId
     * @return bool
     */
    public static function exist($vehicleId): bool
    {
        return !empty(array_filter(self::$vehiclesList, function ($vehicle) use ($vehicleId) {
            return $vehicle->getId() == $vehicleId;
        }));
    }

    /**
     * search through vehicles and get the specific vehicle by id
     *
     * @param $vehicleId
     * @return Vehicle
     */
    public static function getVehicleById($vehicleId): Vehicle
    {
        return current(array_filter(self::$vehiclesList, function ($vehicle) use ($vehicleId) {
            return $vehicle->getId() == $vehicleId;
        }));
    }
}