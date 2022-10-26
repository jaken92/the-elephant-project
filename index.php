<?php 
//<!-- Using the foorloop below to go through the players-array. Calling the different items in the array by i-index and displaying their ['img'] attribute inside each button. i is also used for the button value as i want to store a different value in $_GET depending on which button/player is clicked. -->
declare(strict_types=1); //declaring strict types


$players = [
    ['name' => 'Dennis Reynolds', 'characteristic' => 'Narcisistic', 'img' => './images/dennisReynolds.jpeg'], //Array for player selection
    ['name' => 'Bill Murray', 'characteristic' => 'funny', 'img' => './images/Danny.jpeg'],                     //the img key is fetched by a foorloop 
    ['name' => 'Chris Elliot', 'characteristic' => 'funny', 'img' => './images/dennisReynolds.jpeg'],           //to print out the images on buttons.
    ['name' => 'Stephen Tobowsky','characteristic' => 'funny', 'img' => './images/dennisReynolds.jpeg'],
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

                <form action="index.php" method="get">

                    <button class="character-button" name="playerIndex" type="submit" value="<?php echo $i ?>">
                        <img style="height:40px; width:25px;" src="<?php echo $players[$i]['img'] ?>" alt="schoolphoto of Dennis Reynolds"> 
                    </button>

                </form>

                <?php endfor ?>
            </div>  
        </div>  
    </main>
</body>

</html>
