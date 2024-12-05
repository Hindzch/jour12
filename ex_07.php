<?php

class Game {
    private $length;
    private $players;

    public function __construct() {
        $this->length = 0;
        $this->players = [];
        echo "New game!\n";
    }

    public function addPlayer(Character $player): void {
        $this->players[] = $player;
        echo "New player \"" . $player->getName() . "\".\n";
    }

    public function player(int $index): ?Character {
        return $this->players[$index] ?? null;
    }
}

class Character {
    private $name;
    private $strength;
    private $magic;
    private $intelligence;
    private $life;

    public function __construct(string $name = "Character") {
        static $count = 1;
        $this->name = $name === "Character" ? $name . " " . $count++ : $name;
        $this->strength = 0;
        $this->magic = 0;
        $this->intelligence = 0;
        $this->life = 100;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getLife(): int {
        return $this->life;
    }

    public function attack(Character $target): void {
        echo "\"" . $this->name . "\" hits \"" . $target->getName() . "\".\n";
        $target->takeDamage(0); // Ajoutez une logique de dégâts si nécessaire
    }

    public function takeDamage(int $damage): void {
        $this->life -= $damage;
        echo "\"" . $this->name . "\" loses $damage HP!\n";
    }

    public function __toString(): string {
        return "My name is " . $this->name . ".";
    }
}

// Test des classes
$game = new Game();
$game->addPlayer(new Character());
echo $game->player(0) . "\n";

$game->addPlayer(new Character());
$game->player(0)->attack($game->player(1));

$game->addPlayer(new Character("Julien"));
$game->player(2)->attack($game->player(0));

?>

