<?php


function score(float $answer, float $userAnswer): float {
    $bigger = max($answer, $userAnswer);
    $smaller = min($answer, $userAnswer);

    $playerScore = $bigger - $smaller;
    return $playerScore;

}

echo score(2.0, 7.5);