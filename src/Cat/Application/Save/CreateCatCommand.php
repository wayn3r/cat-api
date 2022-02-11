<?php

namespace CatApp\Cat\Application\Save;

class CreateCatCommand {

    private string $name;
    private int $breedId;
    private string $description;
    private float $longitude;
    private float $latitude;

    public function __construct(
        string $name, 
        int $breedId, 
        string $description, 
        float $longitude, 
        float $latitude
    ) {
        $this->name = $name;
        $this->breedId = $breedId;
        $this->description = $description;
        $this->longitude = $longitude;
        $this->latitude = $latitude;
    }

    public function name(): string {
        return $this->name;
    }
    public function breedId(): int {
        return $this->breedId;
    }
    public function description(): string {
        return $this->description;
    }
    public function longitude(): float {
        return $this->longitude;
    }
    public function latitude(): float {
        return $this->latitude;
    }
}