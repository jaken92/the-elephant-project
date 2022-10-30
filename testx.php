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


if (isset($_POST['answer1'])) {                                 //calling a function to calculate the score based on the userinput "answer" 1-2-3-4-5.
    $userInput1 = $_POST['answer1'];
    $answer1 = (float)$userInput1;
    $_SESSION['playerScore1'] = scoreCalculator(5.5, $answer1);
}

if (isset($_POST['answer2'])) {
    $userInput2 = $_POST['answer2'];
    $answer2 = (float)$userInput2;
    $_SESSION['playerScore2'] = scoreCalculator(5.5, $answer2);
}

if (isset($_SESSION['playerScore1'], $_SESSION['playerScore2'])) {
    echo $_SESSION['totalScore'] = $_SESSION['playerScore1'] + $_SESSION['playerScore2'];
}

// determining which question is appearing based on if the pervious one has been answered. Starting by checking if the player has chosen his player/difficulty. 

if(isset($_SESSION['chosenPlayer'])){
    $form = $forms[1];
}

if(isset($_SESSION['playerScore1'])){
    $form = $forms[2];
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
                <form class="answer-form" action="index.php" method="post">
                    <img src="<?php $form['img']?>" style="height:14vh; width:11vh;" alt="">
                    <div>
                        <label style="color:lime" for="answer">Answer1:</label>
                        <input type="text" name="<?php $form['inputname']?>" value="">
                    </div>
                    <div>
                        <button class="answer-button" type="submit">Submit</button>
                    </div>
                </form>
            
                <form class="answer-form" action="index.php" method="post">
                    <div>
                        <label style="color:lime" for="answer">Answer2:</label>
                        <input type="text" name="answer2" value="">
                    </div>
                    <div>
                        <button class="answer-button" type="submit">Submit</button>
                    </div>        
                </form>
  
                </form>
            </div>    
            <h3>You are playing as:</h3>
            <div class="playercard-container">
                   <?php if (isset($_SESSION['chosenPlayer'])) { ?>
                    <div>
                        <img style="height:14vh; width:11vh;" src="<?php echo $_SESSION['chosenPlayer']['img']; ?>">
                    </div>
                    <?php } ?>
                <div>
                    <p><?php if (isset($_SESSION['chosenPlayer'])) {
                                echo "Name:" . $_SESSION['chosenPlayer']['name'];
                            } ?></p>
                    <p><?php if (isset($_SESSION['chosenPlayer'])) {
                                    echo "Trait:" . $_SESSION['chosenPlayer']['characteristic'];
                                } ?></p>
                    <p><?php if (isset($_SESSION['chosenPlayer'])) {
                                        echo "Difficulty:" .$_SESSION['chosenPlayer']['difficulty'];
                                    } ?></p>
                </div>
            </div>
            <div class="button-container">

                <?php for ($i = 0; $i <= 3; $i++) : ?>

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