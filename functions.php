<?php

declare(strict_types=1);

require __DIR__ . '/arrays.php';


function score(float $answer, float $userAnswer): float {
    $bigger = max($answer, $userAnswer);
    $smaller = min($answer, $userAnswer);

    $playerScore = $bigger - $smaller;
    return $playerScore;

}
