<?php


session_start();

require __DIR__ . '/arrays.php';
require __DIR__ . '/functions.php';

/*  $_GET for registering choice of player, registering a string value by a button click and converting -
the string to an int. the int is saved to $indexInt and the variable is used to fetch the right items
in the players array and save it to $_SESSION['chosenPlayer]. The chosenPlayer variable is used in the html to display the chosen characters name, origin and the game difficulty. */

if (isset($_GET['playerIndex'],)) {
    $indexInt = (int)$_GET['playerIndex'];
    $_SESSION['chosenPlayer'] = $players[$indexInt];
}



// Setting $form to fetch the first item in the indexed array called $forms. Putting the keyvalues from forms "img" and "inputname" in the html form to display the right image for each question, aswell as setting the input "name" when the user submits his/hers values.
$form = $forms[0];

/*the if-statements below is used to check if the user has submitted an answer for each question. If an answer has been set, the answer will be turned into an integer and saved into the $_SESSION['playerScores array']. We make it a session variable as we dont want it to reset when the page is reloading. 
in each iteration of the if-statements below, form is updated to fetch data from the next index in the forms array, containing the data for the next question to be displayed in the html.*/
if (isset($_POST['answer1'])) {
    $guess = $_POST['answer1'];
    $guess = (int)$guess;
    $_SESSION['playerScores'][0] = $guess;

    $form = $forms[1];
}

if (isset($_POST['answer2'])) {
    $guess = $_POST['answer2'];
    $guess = (int)$guess;
    $_SESSION['playerScores'][1] = $guess;

    $form = $forms[2];
}

if (isset($_POST['answer3'])) {
    $guess = $_POST['answer3'];
    $guess = (int)$guess;
    $_SESSION['playerScores'][2] = $guess;

    $form = $forms[3];
}

if (isset($_POST['answer4'])) {
    $guess = $_POST['answer4'];
    $guess = (int)$guess;
    $_SESSION['playerScores'][3] = $guess;

    $form = $forms[4];
}

if (isset($_POST['answer5'])) {
    $guess = $_POST['answer5'];
    $guess = (int)$guess;
    $_SESSION['playerScores'][4] = $guess;

    $form = $forms[5];
}

if (isset($_POST['answer6'])) {
    $guess = $_POST['answer6'];
    $guess = (int)$guess;
    $_SESSION['playerScores'][5] = $guess;

    $form = $forms[6];
}

if (isset($_POST['answer7'])) {
    $guess = $_POST['answer7'];
    $guess = (int)$guess;
    $_SESSION['playerScores'][6] = $guess;

    $form = $forms[7];
}

//checking if the last answer (answer8) is set.
if (isset($_POST['answer8'])) {
    $guess = $_POST['answer8'];
    $guess = (int)$guess;
    $_SESSION['playerScores'][7] = $guess;

    /*if the last answer has been set, we forloop through the $_SESSION['playerScores'] array, giving each iteration a new value by calling the function scoreCalculator with each instance of the playerScores[$i] and forms[$i], we need the releaseYear from forms as it is used to calculate the difference between the players guess and the right answer in scoreCalculator. */
    for ($i = 0; $i <= 7; $i++) {

        $_SESSION['playerScores'][$i] = scoreCalculator($forms[$i]['releaseYear'], $_SESSION['playerScores'][$i]);
    }

    //when the scores has been recalculated, they are added upon eachother into one sum, using the array_sum function. 
    $_SESSION['totalScore'] = array_sum($_SESSION['playerScores']);
    echo $_SESSION['totalScore'];

    // the finalScore function is called with arguments difficulty and totalScore. Since the player already picked a character/difficulty that we stored into $_SESSION['chosenPlayer], we use that and add the key 'difficulty' to fetch the right value in the players array. The second argument is the $_SESSION['totalScore'], containing the sum of all the scores in the $_SESSION['playerScores']- array.
    $totalScore = finalScore($_SESSION['chosenPlayer']['difficulty'], $_SESSION['totalScore']);

    //calling the function for determining the medalvalor with $totalScore as an argument. The switchstatement in the function returns an appropriate medalvalor based on gathered points. The closer to 0 the better valor. 
    $medal = medalValor($totalScore);

    //checking which medalValor was given and randoming a cheeringphrase form the matching array.
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

//post connected to the restartbutton appearing upon game finish. If clicked / set, the session-variables are unset, along with the $cheer
//to make the cheering phrase in the html dissapear.
if (isset($_POST['restart'])) {
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
            <h2>Start the game by chosing the difficulty below, good luck!</h2>
            <div class="game">
                <!-- in this section the questions appear. We use an isset to force the player to chose a difficulty/player before the first question appears. the value of $form is changing to the next iteration of the $forms array everytime a new answer is set, therefore displaying the next question. -->
                <?php if (isset($_SESSION['chosenPlayer'])) : ?>
                    <form class="answer-form" action="index.php" method="post">
                        <img class="form-img" src="<?php echo $form['img'] ?>" style="height:32vh; width:15vw;" alt="">
                        <div class="input-container">
                            <label for="<?php echo $form['inputname'] ?>">How many years ago did the serie first air?</label>
                            <input type="text" name="<?php echo $form['inputname'] ?>" value="">
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
                        <img style="height:14vh; width:11vh;" src="<?php echo $_SESSION['chosenPlayer']['img']; ?>">
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