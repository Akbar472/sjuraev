<?php

class Affordable_houses {
    private $yearOfStartAndCompletion;
    private $numberOfHouses;

    public function __construct($yearOfStartAndCompletion, $numberOfHouses)
    {
        $this->yearOfStartAndCompletion = $yearOfStartAndCompletion;
        $this->numberOfHouses = $numberOfHouses;
    }

    public function yearOfStartAndCompletion() {
        return $this->yearOfStartAndCompletion;
    }

    public function numberOfHouses() {
        return $this->numberOfHouses;
    }
}