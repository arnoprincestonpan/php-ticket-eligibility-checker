<?php

$msg = "<h3>User Information: </h3>";
$msg .= "<ul>";

$firstName = "";
$lastName = "";
$eligableAge = 16;
$ticketCost = (int)12.99 + (int)1.14;

if(isset($_GET["eligibility"])){
    $firstName = $_GET["first-name"];
    $lastName = $_GET["last-name"];
    $age = $_GET["age"];
    $quantity = $_GET["quantity"];
    $cash = $_GET["cash"];

        
    if(is_string($firstName) && is_string($lastName)){
        $msg .= "<li>" . $firstName . " " . $lastName . " " ."</li>";
    }else{
        $msg .= "<li>First or Last name needs to be entered.</li>";
    }

    if(is_numeric($age)){
        if($age >= $eligableAge){
            $msg .= "<li>" . $age . " is of age to watch this movie.</li>";
        }else{
            $msg .= "<li>" . $age . " is not of age. You need to be at least 16.</li>";
        }
    }else{
        $msg .= "<li>Please enter a number for your age.</li>";
    }

    if(is_numeric($quantity)){
        if($quantity < 0){
            $msg .= "<li>Please enter a number greater than 0. You want to buy a ticket right?</li>";
        }
    }else{
        $msg .= "<li>Please enter a number for your quantity of tickets.</li>";
    }

    if(is_numeric($cash)){
        if(($quantity * $ticketCost) >= $cash){
            $msg .= "<li>" . $cash . " is not enough for " . $quantity * $ticketCost . " worth of tickets.</li>";
        }else{
            $msg .= "<li>" . $cash . " is enough for " . $quantity . " tickets.</li>";
        }
    }else{
        $msg += "<li>Please enter a number for cash.</li>";
    }

    if(($quantity * $ticketCost) <= $cash && $age >= 16){
        $msg .= "<li>You purchased ticket(s)!</li>";
    }else{
        $msg .= "<li>You weren't able to purchase tickets.</li>";
    }
}


$msg .= "</ul>"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Eligibility Checker</title>
</head>
<body>
    <h1>Ticket Eligibilty Checker with PHP</h1>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="get">
        <div>
            <label for="first-name">First Name: </label>
            <input id="first-name" value="<?= $firstName  ?>" name="first-name" type="text" />
        </div>
        <div>
            <label for="last-name">Last Name: </label>
            <input id="last-name" value="<?= $lastName ?>" name="last-name" type="text" />
        </div>
        <div>
            <label for="age">Age: </label>
            <input id="age" value="<?= $age ?>" name="age" type="number"  />
        </div>
        <div>
            <label for="quantity">Quantity: </label>
            <input id="quantity" value="<?= $quantity ?>" name="quantity" type="number"  />
        </div>
        <div>
            <label for="cash">Cash: </label>
            <input id="cash" value="<?= $cash ?>" name="cash" type="number"  />
        </div>
        <div>
            <input id="submit" type="submit" value="Check Eligibility" name="eligibility"  />
        </div>
    </form>
    <div>
        <?= $msg?>
    </div>
</body>
</html>