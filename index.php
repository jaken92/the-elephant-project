<?php

session_start();

require __DIR__ . '/functions.php';
require __DIR__ . '/arrays.php';
require __DIR__ . '/if.php';

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
            <h2>Start the game by chosing the difficulty below, good luck!</h2>
            <div class="game">
                <!-- question section. We use an isset to force the player to chose a difficulty/player before the first question appears. the value of $question is changing to the next iteration of the $questions array everytime a new answer is set. -->
                <?php if (isset($_SESSION['chosenPlayer'])) : ?>
                    <form class="answer-form" action="index.php" method="post">
                        <img class="form-img" src="<?php echo $question['img'] ?>" style="height:32vh; width:15vw;" alt="">
                        <div class="input-container">
                            <label for="<?php echo $inputName ?>">How many years ago did the serie first air?</label>
                            <input type="text" name="<?php echo $inputName ?>" value="">
                        </div>
                        <div>
                            <button class="answer-button" type="submit">Submit</button>
                        </div>
                    </form>
                <?php endif ?>
                <!-- the ifstatement below is printing out a cheering phrase when $cheer has been set(at the end of the game), along with a button for restart. -->
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
                    <!-- prints the $_SESSION['chosenPlayer'] attributes if chosen player isset by the $_GET function" -->
                    <div>
                        <img class="chosen-img" style="height:14vh; width:11vh;" src="<?php echo $_SESSION['chosenPlayer']['img']; ?>">
                    </div>
                    <div>
                        <p>
                            <?php echo "Name: " . $_SESSION['chosenPlayer']['name']; ?>
                        </p>
                        <p>
                            <?php echo "From: " . $_SESSION['chosenPlayer']['show']; ?>
                        </p>
                        <p>
                            <?php echo "Difficulty: " . $_SESSION['chosenPlayer']['difficulty']; ?>
                        </p>
                    </div>
                <?php endif ?>
            </div>
            <div class="button-container">
                <?php for ($i = 0; $i <= 3; $i++) : ?>
                    <!--  printing out all the items from the $players array as buttons using a forloop, the index variable is used to set different values to "value" for the $_GET function. Depending on which button is clicked, the $_GET will recieve a different value. -->
                    <div class="column">
                        <h3><?php echo $players[$i]['difficulty'] ?></h3>
                        <form action="index.php" method="get">
                            <button class="character-button" name="playerIndex" type="submit" value="<?php echo $i ?>">
                                <img class="chosen-img" style="height:14vh; width:11vh;" src="<?php echo $players[$i]['img'] ?>" alt="">
                            </button>
                        </form>
                    </div>
                <?php endfor ?>
            </div>
        </div>
    </main>
</body>

</html>