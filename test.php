<?php 
//<!-- Using the foorloop below to go through the players-array. Calling the different items in the array by i-index and displaying their ['img'] attribute inside each button. i is also used for the button value as i want to store a different value in $_GET depending on which button/player is clicked. -->
declare(strict_types=1); //declaring strict types

//Array for player selection the img key is fetched by a foorloop to print out the images on buttons.


$players = [
    ['name' => 'Dennis Reynolds', 'characteristic' => 'Narcisistic', 'img' => './images/dennisReynolds.jpeg', 'difficulty'=> 'Easy'], 
    ['name' => 'Bill Murray', 'characteristic' => 'funny', 'img' => './images/Danny.jpeg', 'difficulty'=> 'Easy'],                    
    ['name' => 'Chris Elliot', 'characteristic' => 'funny', 'img' => './images/dennisReynolds.jpeg', 'difficulty'=> 'Easy'],           
    ['name' => 'Stephen Tobowsky','characteristic' => 'funny', 'img' => './images/dennisReynolds.jpeg', 'difficulty'=> 'Easy'],
];

$chosenPlayer = " ";


if(isset($_GET['playerIndex'],)){               //$_GET for registering choice of player, registering a string value by a button click and converting -
    $indexInt = (int)$_GET['playerIndex'];      //the string to an int. the int is saved to $indexInt and the variable is used to fetch the right items
    $chosenPlayer = $players[$indexInt]['name']; //in the player array.
    
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
            <div class="button-container">

                <?php for($i = 0; $i <= 3; $i++): ?>

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
