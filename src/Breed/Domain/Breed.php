<?php

namespace CatApp\Breed\Domain;

use CatApp\Shared\Domain\AggregateRoot;
use CatApp\Shared\Domain\BreedId;

class Breed extends AggregateRoot {
    private ?BreedId $id;
    private BreedName $name;

    public function __construct(?BreedId $id, BreedName $name) {
        $this->id = $id;
        $this->name = $name;
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

    public function rename(BreedName $name): void{
        $this->name = $name;
    }
    
    public static function fromPrimitive(array $data): Breed {
        return new Breed(
            new BreedId($data['id']),
            new BreedName($data['name'])
        );
    }
    public function toPrimitive(): array {
        return [
            'id' => $this->id() ?? null,
            'name' => $this->name()
        ];
    }

}