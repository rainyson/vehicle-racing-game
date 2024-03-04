<?php

namespace Rainyson\VehicleRacingGame\Commands;

use Rainyson\VehicleRacingGame\Classes\Player;
use Rainyson\VehicleRacingGame\Classes\Race;
use Rainyson\VehicleRacingGame\Classes\VehicleList;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class RaceCommand extends Command
{
    private array $vehicles;

    public function __construct(string $name = null)
    {
        parent::__construct($name);
        $this->vehicles = VehicleList::getVehiclesList();
    }

    /**
     * The name of the command (the part after "bin/demo").
     *
     * @var string
     */
    protected static $defaultName = 'race';

    /**
     * The command description shown when running "php bin/demo list".
     *
     * @var string
     */
    protected static $defaultDescription = 'Play the Vehicle Racing Game!';

    /**
     * Execute the race command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int 0 if everything went fine, or an exit code.
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        // Ask players to choose their names
        $player1Name = trim($io->ask('Player 1, please enter your name:', 'Player 1'));
        $player2Name = trim($io->ask('Player 2, please enter your name:', 'Player 2'));
        // Create player objects for every player with specified name
        $player1 = new Player($player1Name);
        $player2 = new Player($player2Name);
        // Show the list of vehicles to choose
        echo "The list of vehicles and their maximum speed is as follows:";
        foreach ($this->vehicles as $key => $vehicle) {
            if ($key === 0) {
                echo "\n\n";
            }
            echo "{$vehicle->getId()} - {$vehicle->getName()} : {$vehicle->getMaxSpeed()} {$vehicle->getUnit()}\n\n";
        }
        // Ask Player 1 to choose her/him vehicle and save that into player object
        $vehicleNumber = (int)$io->ask("{$player1->getName()}, Please enter your vehicle number");
        if (!VehicleList::exist($vehicleNumber)) {
            $io->error('Invalid Vehicle, Please Choose from The List');
            return Command::FAILURE;
        }
        $player1->setVehicle(VehicleList::getVehicleById($vehicleNumber));
        // Ask Player 2 to choose her/him vehicle and save that into player object
        $vehicleNumber = (int)$io->ask("{$player2->getName()}, Please enter your vehicle number");
        if (!VehicleList::exist($vehicleNumber)) {
            $io->error('Invalid Vehicle, Please Choose from The List');
            return Command::FAILURE;
        }
        $player2->setVehicle(VehicleList::getVehicleById($vehicleNumber));
        // create new race with specified players
        $race = new Race([$player1, $player2]);
        // start the race and specify the race winner
        $winner = $race->start()->getWinner();
        // Show the winner with time
        $io->success("Congratulations {$winner->getName()}! You Won in {$winner->getTime()} Hours");
        // Ask for play again
        if ($io->confirm('Do you want to play again?')) {
            return $this->execute($input, $output);
        }
        return Command::SUCCESS;
    }
}