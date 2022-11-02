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
    $guess = $_POST['answer1'];
    $guess = (int)$guess;
    $_SESSION['playerScore1'] = scoreCalculator($forms[0]['releaseYear'], $guess);

    $form = $forms[1];

    echo $_SESSION['playerScore1'];
}

if (isset($_POST['answer2'])) {
    $guess = $_POST['answer2'];
    $guess = (int)$guess;
    $_SESSION['playerScore2'] = scoreCalculator($forms[1]['releaseYear'], $guess);

    $form = $forms[2];

    echo $_SESSION['playerScore2'];
}

if (isset($_POST['answer3'])) {
    $guess = $_POST['answer3'];
    $guess = (int)$guess;
    $_SESSION['playerScore3'] = scoreCalculator($forms[2]['releaseYear'], $guess);

    $form = $forms[3];

    echo $_SESSION['playerScore3'];
}

if (isset($_POST['answer4'])) {
    $guess = $_POST['answer4'];
    $guess = (int)$guess;
    $_SESSION['playerScore4'] = scoreCalculator($forms[3]['releaseYear'], $guess);

    $form = $forms[4];

    echo $_SESSION['playerScore4'];
}

if (isset($_POST['answer5'])) {
    $guess = $_POST['answer5'];
    $guess = (int)$guess;
    $_SESSION['playerScore5'] = scoreCalculator($forms[4]['releaseYear'], $guess);

    $form = $forms[5];

    echo $_SESSION['playerScore5'];
}

if (isset($_POST['answer6'])) {
    $guess = $_POST['answer6'];
    $guess = (int)$guess;
    $_SESSION['playerScore6'] = scoreCalculator($forms[5]['releaseYear'], $guess);

    $form = $forms[6];

    echo $_SESSION['playerScore6'];
}

if (isset($_POST['answer7'])) {
    $guess = $_POST['answer7'];
    $guess = (int)$guess;
    $_SESSION['playerScore7'] = scoreCalculator($forms[6]['releaseYear'], $guess);

    $form = $forms[7];

    echo $_SESSION['playerScore7'];
}

if (isset($_POST['answer8'])) {
    $guess = $_POST['answer8'];
    $guess = (int)$guess;
    $_SESSION['playerScore8'] = scoreCalculator($forms[7]['releaseYear'], $guess);


    echo $_SESSION['playerScore8'];
}
/*
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
*/
if (isset($_SESSION['playerScore1'], $_SESSION['playerScore2'], $_SESSION['playerScore3'], $_SESSION['playerScore4'], $_SESSION['playerScore5'], $_SESSION['playerScore6'], $_SESSION['playerScore7'], $_SESSION['playerScore8'])) {

    $_SESSION['totalScore'] = $_SESSION['playerScore1'] + $_SESSION['playerScore2'] + $_SESSION['playerScore3'] + $_SESSION['playerScore4'] + $_SESSION['playerScore5'] + $_SESSION['playerScore6'] + $_SESSION['playerScore7'] + $_SESSION['playerScore8'];

    $totalScore = finalScore($_SESSION['chosenPlayer']['difficulty'], $_SESSION['totalScore']);

    $medal = medalValor($totalScore);

    if ($medal === "gold") {
        shuffle($gold);
        $cheer = $gold[0];
    } elseif ($medal === "silver") {
        shuffle($silver);
        $cheer = $silver[0];
    } elseif ($medal === "bronze") {
        shuffle($bronze);
        $cheer = $bronze[0];
    } else {
        shuffle($nomedal);
        $cheer = $nomedal[0];
    }
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
if(isset($_POST['restart'])){
    unset($cheer);
    session_unset();
    
}


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
                <?php if (isset($_SESSION['chosenPlayer'])) : ?>
                <form class="answer-form" action="index.php" method="post">
                    <img src="<?php echo $form['img'] ?>" style="height:28vh; width:13vw;" alt="">
                    <div class="input-container">
                        <label style="color:lime" for="<?php echo $form['inputname'] ?>">How many years ago did the serie first air?</label>
                        <input type="text" name="<?php echo $form['inputname'] ?>" value="">
                    </div>
                    <div>
                        <button class="answer-button" type="submit">Submit</button>
                    </div>
                </form>
                <?php endif ?>
                <?php if (isset($cheer)) : ?>
                    <div class="cheer">
                        <h3><?php echo $cheer ?></h3>
                    </div>
                    <form action="index.php" method="POST">
                    <button class="answer-button" name="restart" type="submit">Restart</button>
                </form>
                <?php endif ?>
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
                            <?php echo "From:" . $_SESSION['chosenPlayer']['show']; ?>
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