<?php

declare(strict_types=1);

//Array for player selection the img key is fetched by a foorloop to print out the images on buttons.
$players = [
    ['name' => 'Walter White', 'show' => 'Breaking Bad', 'img' => './images/Walter.jpeg', 'difficulty' => 'Easy'],
    ['name' => 'Cartman', 'show' => 'South Park', 'img' => './images/eric2.jpeg', 'difficulty' => 'Medium'],
    ['name' => 'Frank', 'show' => 'It´s always sunny in Philadelphia', 'img' => './images/Danny.jpeg', 'difficulty' => 'Hard'],
    ['name' => 'SpongeBob', 'show' => 'Spongebob Squarepants', 'img' => './images/spongebob.png', 'difficulty' => 'Hardest'],
];


//array containing information about each question fetched by the $question variable in index.php.
$questions = [
    ['img' => './images/southpark.jpeg', 'releaseYear' => 1997],
    ['img' => './images/gameofthrones.jpeg', 'releaseYear' =>  2011],
    ['img' => './images/rederiet.jpeg', 'releaseYear' => 1992],
    ['img' => './images/workaholics.jpeg', 'releaseYear' => 2011],
    ['img' => './images/sopranos.jpeg', 'releaseYear' => 1999],
    ['img' => './images/seinfield.jpeg', 'releaseYear' => 1989],
    ['img' => './images/thewire2.jpeg', 'releaseYear' => 2002],
    ['img' => './images/itsalwayssunny.jpeg', 'releaseYear' => 2005],
];


//arrays containing different cheering phrases.

$gold = ["Wow, nice work, you´ve won the Goldmedal!", "Well played chap, you´ve won the Goldmedal ", "pfff are you cheating?! You´ve won the Goldmedal!"];

$silver = ["Not bad, you´ve won the Silvermedal!", "You´re pretty good at this arn´t you? You´ve won SILVER!", "Good job human, you´ve won silver!"];

$bronze = ["Not tooo bad, you won the Bronzemedal!", "You´ve won bronze, cheers, i guess..", "You won bronze! Try again for the GOLD!"];

$nomedal = ["NOT GOOD ENOUGH. TRY AGAIN", "You dont watch alot of series, do you? You missed the podium ;(."];
