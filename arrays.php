<?php

declare(strict_types=1);

//Array for player selection the img key is fetched by a foorloop to print out the images on buttons.
$players = [
    ['name' => 'Walter White', 'show' => 'Breaking Bad', 'img' => './images/Walter.jpeg', 'difficulty' => 'Easy', 'border' => 'green'],
    ['name' => 'Cartman', 'show' => 'South Park', 'img' => './images/eric2.jpeg', 'difficulty' => 'Medium', 'border' => 'yellow'],
    ['name' => 'Frank', 'show' => 'It´s always sunny in Philadelphia', 'img' => './images/Danny.jpeg', 'difficulty' => 'Hard', 'border' => 'orange'],
    ['name' => 'SpongeBob', 'show' => 'Spongebob Squarepants', 'img' => './images/spongebob.png', 'difficulty' => 'Hardest', 'border' => 'red'],
];


//array containing information about each question fetched by the $form variable in index.php.
$forms = [
    ['img' => './images/southpark.jpeg', 'inputname' => 'answer1', 'releaseYear' => 1997],
    ['img' => './images/gameofthrones.jpeg', 'inputname' => 'answer2', 'releaseYear' =>  2011],
    ['img' => './images/rederiet.jpeg', 'inputname' => 'answer3', 'releaseYear' => 1992],
    ['img' => './images/workaholics.jpeg', 'inputname' => 'answer4', 'releaseYear' => 2011],
    ['img' => './images/sopranos.jpeg', 'inputname' => 'answer5', 'releaseYear' => 1999],
    ['img' => './images/seinfield.jpeg', 'inputname' => 'answer6', 'releaseYear' => 1989],
    ['img' => './images/thewire2.jpeg', 'inputname' => 'answer7', 'releaseYear' => 2002],
    ['img' => './images/itsalwayssunny.jpeg', 'inputname' => 'answer8', 'releaseYear' => 2005],
];


//arrays containing different cheering phrases.

$gold = ["Wow, nice work, you won the Goldmedal!", "Well played chap, you won the Goldmedal ", "pfff are you cheating?! You won the Goldmedal!"];

$silver = ["Not bad, you won the Silvermedal!", "You´re pretty good at this arn´t you? You won SILVER!", "Good job human, you won silver!"];

$bronze = ["Not tooo bad, you won the Bronzemedal!", "You won bronze, cheers, i guess..", "You won bronze! Try again for the GOLD!"];

$nomedal = ["NOT GOOD ENOUGH. TRY AGAIN", "You dont watch alot of series, do you? You missed the podium ;("];
