<?php
//Require permet de nous assurer que ce qu'on fais est vraiment operationnel c'est le Require qui nous stop avec une erreur
//on peut egalement utilisé l'include qui lui nous met seulement un warning 
include "Chambre.php";
include "Client.php";
Include "Hotel.php";
Include "Reservation.php";

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/css/uikit.min.css" />
  <link rel="stylesheet" href="style.css" />
  <title>Hôtel</title>
</head>
<body>
<main>
  <div class = container>


<?php




// Les objets clients de la classe clients 
$client1 = new Client( "MURMANN",  "Micka",  "06 98 48 56 23",  "micka.Murmann@outlook.fr");
$client2 = new Client( "GIBELLO",  "Virgile","06 56 48 76 96",  "virgile.Gibello@outlook.fr");

// Les objets hotels de la classe hotel 
$hotel1 = new Hotel(" Hilton", "10 route de la gare", "67000", "Strasbourg" );
$hotel2 = new Hotel(" Regent", "61 Rue Dauphine", "75006", "Paris" );

//Hotel hilton collection de chambre
$ch1Hilton  = new Chambre( "1", "2", "120", False, True, $hotel1);
$ch2Hilton  = new Chambre( "2","2", "120", False, True, $hotel1);
$ch3Hilton  = new Chambre( "3","2", "120", False, False, $hotel1);
$ch4Hilton  = new Chambre( "4","2", "120", True, False, $hotel1);
$ch5Hilton  = new Chambre( "5","2", "300", False, True, $hotel1);
$ch6Hilton  = new Chambre( "6","2", "300", False, False, $hotel1);
$ch7Hilton  = new Chambre( "7","2", "300", False, True, $hotel1);
$ch8Hilton  = new Chambre( "8","2", "300", False, True, $hotel1);
$ch9Hilton  = new Chambre( "9","2", "300", False, True, $hotel1);
$ch10Hilton = new Chambre( "10","2", "300", False, True, $hotel1);


//Hotel Regent collection de chambre
$ch1Regent   = new Chambre( "1", "2", "120", False, True, $hotel2);
$ch2Regent   = new Chambre( "2","2", "120", True, True, $hotel2);
$ch3Regent   = new Chambre( "3","2", "120", False, True, $hotel2);
$ch4Regent   = new Chambre( "4","2", "120", False, True, $hotel2);
$ch5Regent   = new Chambre( "5","2", "300", True, True, $hotel2);
$ch6Regent   = new Chambre( "6","2", "300", False, True, $hotel2);
$ch7Regent   = new Chambre( "7","2", "300", False, True, $hotel2);
$ch8Regent   = new Chambre( "8","2", "300", False, True, $hotel2);
$ch9Regent   = new Chambre( "9","2", "300", True, True, $hotel2);
$ch10Regent  = new Chambre( "10","2", "300", False, True, $hotel2);


//Chambre collection de reservation
$reservation = new Reservation($client1, "212212", "2021-03-11", "2021-03-15", $ch3Hilton);
$reservation2 = new Reservation($client1, "213213", "2021-04-01", "2021-04-17", $ch4Hilton);
$reservation3 = new Reservation($client2, "214214", "2021-01-01", "2021-01-01", $ch10Hilton);

// client collection de reservation
/*$clientReservation1 = new Reservation($client1, $reservation, "212212", "2021-03-11", $ch3Hilton);
  $clientReservation2 = new Reservation($client1, $reservation2, "213213", "2021-04-01", $ch4Hilton);
  $clientReservation3 = new Reservation($client2, $reservation3, "214214", "2021-01-01", $ch10Hilton);*/


echo $hotel1->afficherInformations();
echo $hotel1->afficherReservations();
echo $hotel2->afficherReservations();
echo $client1->afficherReservations();
echo $hotel1->afficherStatut();


?>
  </div>
 </main>
 <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit-icons.min.js"></script>
 
</body>
</html>



