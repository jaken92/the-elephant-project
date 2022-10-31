<?php
//<!-- Using the foorloop below to go through the players-array. Calling the different items in the array by i-index and displaying their ['img'] attribute inside each button. i is also used for the button "value" as i want to store a different value in $_GET depending on which button/player is clicked. -->

//declaring strict types

//Array for player selection the img key is fetched by a foorloop to print out the images on buttons.

session_start();

require __DIR__ . '/arrays.php';
require __DIR__ . '/functions.php';

if (isset($_GET['playerIndex'],)) {               //$_GET for registering choice of player, registering a string value by a button click anconverting -
    $indexInt = (int)$_GET['playerIndex'];      //the string to an int. the int is saved to $indexInt and the variable is used to fetch the right items
    $_SESSION['chosenPlayer'] = $players[$indexInt];        //in the player array.
}

//feting the userinput from the from on line 76 with $_POST. The name of the post is set by the forms array called on as form['inputname'].
//if the user has submitted the input, the IF statements below turns the input into a float and calls on the function scoreCalculator($correctAnswer, $userAnswer). the function returns the players score and it is stored as a Session-variable. 

$form = $forms[0];
if (isset($_POST['answer1'])) {
    $userInput = $_POST['answer1'];
    $answer = (float)$userInput;
    $_SESSION['playerScore1'] = scoreCalculator($forms[0]['correctAnswer'], $answer);

    $form = $forms[1];
}

if (isset($_POST['answer2'])) {
    $userInput = $_POST['answer2'];
    $answer = (float)$userInput;
    $_SESSION['playerScore2'] = scoreCalculator($forms[1]['correctAnswer'], $answer);

    $form = $forms[2];
}

if (isset($_POST['answer3'])) {
    $userInput = $_POST['answer3'];
    $answer = (float)$userInput;
    $_SESSION['playerScore3'] = scoreCalculator($forms[2]['correctAnswer'], $answer);

    $form = $forms[3];
}

if (isset($_POST['answer4'])) {
    $userInput = $_POST['answer4'];
    $answer = (float)$userInput;
    $_SESSION['playerScore4'] = scoreCalculator($forms[3]['correctAnswer'], $answer);
}

if (isset($_SESSION['playerScore1'], $_SESSION['playerScore2'])) {
    echo $_SESSION['totalScore'] = $_SESSION['playerScore1'] + $_SESSION['playerScore2'];
}
/*
// Setting $form to fetch the first item in the indexed array called $forms. Putting the keyvalues from forms "img" and "inputname" in the html form to display the right image for each question, aswell as setting the input "name".
$form = $forms[0];

print_r($form);
// checking if playerScore1 is set. If true, the if statements changes the value of $form (used in the html form) to the next item in the array $forms, making it display the next question. 
if(isset($_SESSION['playerScore1'])){
    $form = $forms[1];
}

//again checking if the previous questions score has been set, and changing it up if true. 
if(isset($_SESSION['playerScore2'])){
    $form = $forms[2];
}

if(isset($_SESSION['playerScore3'])){
    $form = $forms[3];
}
*/



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header></header>
    <main>
        <div class="gamewindow">
            <h1>Welcome to the serie Quiz!</h1>
            <h2>Chose which player you want to plays as below</h2>
            <div class="game">
                <form class="answer-form" action="index.php" method="post">
                    <img src="<?php echo $form['img'] ?>" style="height:14vh; width:11vh;" alt="">
                    <div>
                        <label style="color:lime" for="answer">Answer1:</label>
                        <input type="text" name="<?php echo $form['inputname'] ?>" value="">
                    </div>
                    <div>
                        <button class="answer-button" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <h3>You are playing as:</h3>
            <div class="playercard-container">
                <?php if (isset($_SESSION['chosenPlayer'])) : ?>
                    <!-- prints the "chosenPlayer attributes if chosen player isset" -->
                    <div>
                        <img style="height:14vh; width:11vh;" src="<?php echo $_SESSION['chosenPlayer']['img']; ?>">
                    </div>
                    <div>
                        <p>
                            <?php echo "Name:" . $_SESSION['chosenPlayer']['name']; ?>
                        </p>
                        <p>
                            <?php echo "Trait:" . $_SESSION['chosenPlayer']['characteristic']; ?>
                        </p>
                        <p>
                            <?php echo "Difficulty:" . $_SESSION['chosenPlayer']['difficulty']; ?>
                        </p>
                    </div>
                <?php endif ?>
            </div>
            <div class="button-container">

                <?php for ($i = 0; $i <= 3; $i++) : ?>
                    <!-- printing out all characters using a forloop -->

                    <div class="column">
                        <h3><?php echo $players[$i]['difficulty'] ?></h3>

                        <form action="index.php" method="get">

                            <button class="character-button" name="playerIndex" type="submit" value="<?php echo $i ?>">
                                <img style="height:14vh; width:11vh;" src="<?php echo $players[$i]['img'] ?>" alt="schoolphoto of Dennis Reynolds">
                            </button>

                        </form>

                    </div>

                <?php endfor ?>
            </div>
        </div>
    </main>
</body>

</html>