<?php

require __DIR__ . '/vendor/autoload.php';

use Rainyson\VehicleRacingGame\Classes\VehicleList;
use Rainyson\VehicleRacingGame\Commands\RaceCommand;
use Symfony\Component\Console\Application;

// Create a list of vehicles
VehicleList::setVehiclesList();

// Create an instance of application
$application = new Application();

// add race command
$application->add(new RaceCommand());

// Run the application with executing command
$application->run();