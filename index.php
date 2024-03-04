<?php

require __DIR__ . '/vendor/autoload.php';

use Rainyson\VehicleRacingGame\Commands\RaceCommand;
use Rainyson\VehicleRacingGame\VehicleList;
use Symfony\Component\Console\Application;

VehicleList::setVehiclesList();

$application = new Application();

$application->add(new RaceCommand());

$application->run();