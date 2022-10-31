<?php

declare(strict_types=1);


require __DIR__ . '/arrays.php';


function scoreCalculator(float $answer, string $userAnswer): float {
    $bigger = max($answer, $userAnswer);
    $smaller = min($answer, $userAnswer);

    $playerScore = $bigger - $smaller;
    return $playerScore;

};

function finalScore($difficulty, $totalScore): float{
    if($difficulty === "Hardest"){
        return $totalScore;
    }

    elseif($difficulty === "Hard"){
        return $totalScore - 2;
    }
    elseif($difficulty === "Medium"){
        return $totalScore - 4;
    }
    else{
        return $totalScore - 6;
    }
}
// inspo switch https://stackoverflow.com/questions/24812851/using-comparison-operators-in-a-php-switch-statement
function medalValor($finalScore):string{
    switch (true) {
        case $finalScore <= 8:
            $medal = "gold";
            return $medal;
            break;
    
        case $finalScore <= 10:
            $medal = "silver";
            return $medal;
            break;
    
        case $finalScore <= 12:
            $medal = "bronze";
            return $medal;
            break;
    
        case $finalScore > 12;
            $medal = "no medal"; 
            return $medal;
            break;   
    }
}



