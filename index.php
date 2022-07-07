<?php
$hello = 3;
var_dump($hello);
$page_title = 'Home';
include('includes/header.html');



require_once __DIR__ . '/Person.php';
$person = new Person('Zura', '28');
echo "The person is " . $person->getName();

// puts an image of a dog in the folder includes
echo '<img src="includes/dog.jpg" alt="A cute dog" width="200" height="200">';

include('includes/footer.html');
