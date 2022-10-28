<?php

declare(strict_types=1);

require __DIR__ . '/arrays.php';


function scoreCalculator(float $answer, string $userAnswer): float {
    $bigger = max($answer, $userAnswer);
    $smaller = min($answer, $userAnswer);

    $playerScore = $bigger - $smaller;
    return $playerScore;

}
