<?php

declare(strict_types=1);

require __DIR__ . '/arrays.php';


function scoreCalculator(float $answer, string $userAnswer): float {
    $bigger = max($answer, $userAnswer);
    $smaller = min($answer, $userAnswer);

    $playerScore = $bigger - $smaller;
    return $playerScore;

};

/*

if(isset($chosenPlayer)){
    form=form1
    echo form
    if(isset($answer1)){
        form = form2
        
    }
}



<form class="answer-form" action="index.php" method="post">
<img src="./images/dennisReynolds.jpeg" style="height:14vh; width:11vh;" alt="">
<div>
    <label style="color:lime" for="answer">Answer1:</label>
    <input type="text" name="answer1" value="">
</div>
<div>

*/