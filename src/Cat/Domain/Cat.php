<?php

namespace CatApp\Cat\Domain;

use CatApp\Shared\Domain\AggregateRoot;
use CatApp\Shared\Domain\BreedId;

class Cat extends AggregateRoot {
    private ?CatId $id;
    private CatName $name;
    private BreedId $breedId;
    private CatDescription $description;
    private CatLongitude $longitude;
    private CatLatitude $latitude;

    public function __construct(
        ?CatId $id, 
        CatName $name,
        BreedId $breedId,
        CatDescription $description,
        CatLongitude $longitude,
        CatLatitude $latitude
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->breedId = $breedId;
        $this->description = $description;
        $this->longitude = $longitude;
        $this->latitude = $latitude;
    }

    public function id(): ?int {
        if(!$this->id) {
            return null;
        }
        return $this->id->value();
    }
    public function name(): string {
        return $this->name->value();
    }
    public function breed(): int {
        return $this->breedId->value();
    }
    public function description(): string {
        return $this->description->value();
    }
    public function latitude(): float {
        return $this->latitude->value();
    }
    public function longitude(): float {
        return $this->longitude->value();
    }
    public function rename(CatName $name): void{
        $this->name = $name;
    }
    public function changeDescription(CatDescription $description): void{
        $this->description = $description;
    }
    public function changeBreed(BreedId $breedId): void{
        $this->breedId = $breedId;
    }
    public function changeLocation(CatLatitude $latitude, CatLongitude $longitude): void{
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }
    
    public static function fromPrimitive(array $data): Cat {
        return new Cat(
            new CatId($data['id']),
            new CatName($data['name']),
            new BreedId($data['breedId']),
            new CatDescription($data['description']),
            new CatLongitude($data['longitude']),
            new CatLatitude($data['latitude'])
        );
    }
    public function toPrimitive(): array {
        return [
            'id' => $this->id() ?? null,
            'name' => $this->name(),
            'breedId' => $this->breed(),
            'description' => $this->description(),
            'longitude' => $this->longitude(),
            'latitude' => $this->latitude()
        ];
    }

}