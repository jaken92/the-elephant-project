<?php

declare(strict_types=1);

//fetching the users choice of player/difficulty with $_GET. 
if (isset($_GET['playerIndex'],)) {
    $indexInt = (int)$_GET['playerIndex'];
    $_SESSION['chosenPlayer'] = $players[$indexInt];
}

//setting $question to display questions[0] and $inputName to answer[0] matching the questions array-index.
$question = $questions[0];
$inputName = "answer[0]";

//$lastIndex is set to the same to the same value as the index of the last item of the questions array ([7] with the current number of questions). 
$lastIndex = count($questions) - 1;

//Looping through the $_POST[answer]-array, saving the users guess into a session variable and making the next instance of questions appear. We are not looping the last iteration because we want to trigger different things when the last answer[] has been set. 
for ($i = 0; $i < $lastIndex; $i++) {

    if (isset($_POST['answer'][$i])) {
        $guess = $_POST['answer'][$i];
        $guess = (int)$guess;
        $_SESSION['playerScores'][$i] = $guess;
        //the index of questions and answer is increased by one because these array´s [0]-index is alrdy used in the html before the first instance of the loop is triggered. They keep staying one iteration ahead, to display the next question before we check if its respective post has been set.
        $indexIncreased = $i + 1;
        $inputName = "answer[$indexIncreased]";
        $question = $questions[$indexIncreased];
    }
}

// the lastIndex variable here will act as index to check if the very last questions answer has been set. This is put outside of the forloop above since we want to trigger more events such a scorecounting when the last answer has been sent. 
if (isset($_POST['answer'][$lastIndex])) {
    $guess = $_POST['answer'][$lastIndex];
    $guess = (int)$guess;
    $_SESSION['playerScores'][$lastIndex] = $guess;

    //looping through the playerScores array and calling the scoreCalculator with each instance as an argument along with the matching releaseYear. 
    for ($i = 0; $i <= $lastIndex; $i++) {

        $_SESSION['playerScores'][$i] = scoreCalculator($questions[$i]['releaseYear'], $_SESSION['playerScores'][$i]);
    }

    //when the scores has been recalculated, they are added upon eachother into one sum, using the array_sum function. 
    $_SESSION['totalScore'] = array_sum($_SESSION['playerScores']);

    //finalScore is called, deducting points depending on the chosen difficulty.
    $totalScore = finalScore($_SESSION['chosenPlayer']['difficulty'], $_SESSION['totalScore']);

    //medalValor is calculating the mdealvalor based on the players score. 
    $medal = medalValor($totalScore);

    //checking which medalValor was given and randoming a cheeringphrase form the matching array.
    if ($medal === "gold") {
        shuffle($gold);
        $cheer = $gold[0] . " Your guesses were off by " . $_SESSION['totalScore'] . " years in total!";
    } elseif ($medal === "silver") {
        shuffle($silver);
        $cheer = $silver[0] . " Your guesses were off by " . $_SESSION['totalScore'] . " years in total!";
    } elseif ($medal === "bronze") {
        shuffle($bronze);
        $cheer = $bronze[0] . " Your guesses were off by " . $_SESSION['totalScore'] . " years in total!";
    } else {
        shuffle($nomedal);
        $cheer = $nomedal[0] . " Your guesses were off by " . $_SESSION['totalScore'] . " years in total!";
    }
}
//post connected to the restartbutton appearing upon game finish. If clicked / set, the session-variables are unset, along with the $cheer.
if (isset($_POST['restart'])) {
    unset($cheer);
    session_unset();
}
