<?php

// Classe abstraite Character
abstract class Character {
    private $name;
    private $strength;
    private $magic;
    private $intelligence;
    private $life;

    public function __construct(string $name, int $strength, int $magic, int $intelligence, int $life) {
        static $count = 1;
        $this->name = $name === "" ? static::class . " " . $count++ : $name;
        $this->strength = $strength;
        $this->magic = $magic;
        $this->intelligence = $intelligence;
        $this->life = $life;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getLife(): int {
        return $this->life;
    }

    public function attack(Character $target): void {
        $damage = $this->strength;
        echo "\"" . $this->name . "\" hits \"" . $target->getName() . "\".\n";
        $target->takeDamage($damage);
    }

    public function takeDamage(int $damage): void {
        $this->life -= $damage;
        echo "\"" . $this->name . "\" loses $damage HP!\n";
        if ($this->life <= 0) {
            echo "\"" . $this->name . "\" died.\n";
        }
    }

    public function __toString(): string {
        return "My name is " . $this->name . ".";
    }
}

// Sous-classe Troll
class Troll extends Character {
    public function __construct(string $name = "") {
        parent::__construct($name, 50, 15, 10, 200);
    }
}

// Sous-classe Goblin
class Goblin extends Character {
    public function __construct(string $name = "") {
        parent::__construct($name, 35, 20, 40, 150);
    }
}

// Sous-classe Pangolin
class Pangolin extends Character {
    public function __construct(string $name = "") {
        parent::__construct($name, 40, 10, 55, 120);
    }

    public function heal(?Character $target = null): void {
        $healAmount = 20;
        $target = $target ?: $this; // Par défaut, soigne lui-même
        $target->recover($healAmount);
    }

    private function recover(int $amount): void {
        $this->life += $amount;
        echo "\"" . $this->getName() . "\" heals for $amount HP!\n";
    }
}

// Classe Game
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

// Test des classes
$game = new Game();
$game->addPlayer(new Goblin());
echo $game->player(0) . "\n";

$game->addPlayer(new Troll());
$game->player(1)->attack($game->player(0));

$game->addPlayer(new Pangolin("Julien"));
$game->player(2)->heal($game->player(0));
$game->player(0)->attack($game->player(2));
$game->player(2)->heal($game->player(2));
$game->player(1)->attack($game->player(0));

?>
