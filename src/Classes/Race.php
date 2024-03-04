<?php

namespace Rainyson\VehicleRacingGame\Classes;

class Race
{
    private array $players;
    private int $distance;

    /**
     * Create Race object with list players and random distance in kilometers
     *
     * @param array $players
     */
    public function __construct(array $players)
    {
        $this->players = $players;
        $this->distance = rand(100, 999);
    }

    /**
     * Start the race and generate race time for every player
     *  and save to player object time field
     *
     * @return $this
     */
    public function start(): Race
    {
        foreach ($this->players as $player) {
            $speed = $player->getVehicle()->convertSpeed(new KmhSpeedUnit());
            $time = $this->distance / $speed;
            $player->setTime($time);
        }
        return $this;
    }

    /**
     * Sort players by race time and return the winner
     *
     * @return Player
     */
    public function getWinner(): Player
    {
        usort($this->players, fn($player1, $player2) => $player1->getTime() <=> $player2->getTime());
        return $this->players[0];
    }
}