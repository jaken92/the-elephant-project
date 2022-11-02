<?php

declare(strict_types=1);


require __DIR__ . '/arrays.php';

//calculating the score for each guess of the user. First calculating the $correctAnswer by determining how long time ago the serie was released using the idate function displaying the current year as an int. in the next instance $bigger is set to the bigger number of the $userAnswer and $correctAnswer, and $smaller is set to be the smaller number. This way of calculating assures that the correct score is returned regardless if the users guess was that the serie was released too many or too few years ago.

function scoreCalculator(int $releaseYear, int $userAnswer): int
{
    $correctAnswer = idate("Y") - $releaseYear;

    $bigger = max($correctAnswer, $userAnswer);
    $smaller = min($correctAnswer, $userAnswer);
    $playerScore = $bigger - $smaller;
    return $playerScore;
}


//function deducting points based on the chosen difficulty. Since the point system is inverted, the less points the better, less points are deducted on the higher the difficulties. 
function finalScore(string $difficulty, int $totalScore): int
{
    if ($difficulty === "Hardest") {
        return $totalScore;
    } elseif ($difficulty === "Hard") {
        return $totalScore - 5;
    } elseif ($difficulty === "Medium") {
        return $totalScore - 10;
    } else {
        return $totalScore - 15;
    }
}


//function for determining medalvalor. The switch is set to true to always run when called and each case is returning a different valor depending on the users Score. 
// inspo switch https://stackoverflow.com/questions/24812851/using-comparison-operators-in-a-php-switch-statement
function medalValor($finalScore): string
{
    switch (true) {
        case $finalScore <= 6:
            $medal = "gold";
            return $medal;
            break;

        case $finalScore <= 10:
            $medal = "silver";
            return $medal;
            break;

        case $finalScore <= 14:
            $medal = "bronze";
            return $medal;
            break;

        case $finalScore > 14;
            $medal = "no medal";
            return $medal;
            break;
    }
}
