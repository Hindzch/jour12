<?php

class Character {
    private $name;
    private $strength;
    private $magic;
    private $intelligence;
    private $life;

    // Constructeur
    public function __construct(string $name = "Character") {
        static $i = 1;
        $this->name = $name === "Character" ? $name . " " . $i++ : $name;
        $this->strength = 0;
        $this->magic = 0;
        $this->intelligence = 0;
        $this->life = 100;
    }

    // Méthodes pour accéder aux attributs privés
    protected function getName(): string {
        return $this->name;
    }

    protected function getStrength(): int {
        return $this->strength;
    }

    protected function getMagic(): int {
        return $this->magic;
    }

    protected function getIntelligence(): int {
        return $this->intelligence;
    }

    protected function getLife(): int {
        return $this->life;
    }

    // Méthode magique __toString pour afficher le nom
    public function __toString(): string {
        return "My name is " . $this->name . ".";
    }
}

// Test des objets créés
foreach ([new Character(), new Character("Julien"), new Character()] as $character) {
    echo $character . "\n";
}

?>
