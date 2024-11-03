<?php

Include "Chambre.php";
Include "Client.php";
Include "Hotel.php";
Include "Reservation.php";


//Require permet de nous assurer que ce qu'on fais est vraiment operationnel c'est le Require qui nous stop avec une erreur
//on peut egalement utilisé l'include qui lui nous met seulement un warning 

//Un client va avoir uen collection de reservation/ un hotel1 va avoirt une collection de chambre et une chambre va avoir une collection de reservation. un titulmaire avais plusieurs compte en banque regarder exemple banque.

//liste de reservation pr le client pr lhotzel et detail de chambre*********************


$client1 = new Client( "MURMANN",  "Micka",  "06 98 48 56 23",  "micka.Murmann@outlook.fr");
$client2 = new Client( "GIBELLO",  "Virgile","06 56 48 76 96",  "virgile.Gibello@outlook.fr");

// Crée objet Hotel
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


//Hotel hilton collection de chambre
$ch1Regent   = new Chambre( "1", "2", "120", False, True, $hotel2);
$ch2Regent   = new Chambre( "2","2", "120", False, True, $hotel2);
$ch3Regent   = new Chambre( "3","2", "120", False, True, $hotel2);
$ch4Regent   = new Chambre( "4","2", "120", False, True, $hotel2);
$ch5Regent   = new Chambre( "5","2", "300", False, True, $hotel2);
$ch6Regent   = new Chambre( "6","2", "300", False, True, $hotel2);
$ch7Regent   = new Chambre( "7","2", "300", False, True, $hotel2);
$ch8Regent   = new Chambre( "8","2", "300", False, True, $hotel2);
$ch9Regent   = new Chambre( "9","2", "300", False, True, $hotel2);
$ch10Regent  = new Chambre( "10","2", "300", False, True, $hotel2);

// var_dump($chambre3);

// Création des objets DateTime
// $dateDebut1 = new Reservation(2021-03-11);
// $dateFin1 = new Reservation(2021-03-15);

// $dateDebut2 = new Reservation(2021-04-01);
// $dateFin2 = new Reservation(2021-04-01);

// $dateDebut3 = new Reservation(2021-01-01);
// $dateFin3 = new Reservation(2021-01-01);

// $numeroReservation1 = new Reservation(212212);
// $numeroReservation2 = new Reservation(213213);
// $numeroReservation3 = new Reservation(214214);

//chambre collection de reservation
$reservation = new Reservation($client1, "212212", "2021-03-11", "2021-03-15", $ch3Hilton);
$reservation2 = new Reservation($client1, "213213", "2021-04-01", "2021-04-17", $ch4Hilton);
$reservation3 = new Reservation($client2, "214214", "2021-01-01", "2021-01-01", $ch10Hilton);

// client collection de reservation
/*
$clientReservation1 = new Reservation($client1, $reservation, "212212", "2021-03-11", $ch3Hilton);
$clientReservation2 = new Reservation($client1, $reservation2, "213213", "2021-04-01", $ch4Hilton);
$clientReservation3 = new Reservation($client2, $reservation3, "214214", "2021-01-01", $ch10Hilton);
*/


echo $hotel1->afficherInformations();
echo $hotel1->afficherReservations();
echo $hotel2->afficherReservations();
echo $client1->afficherReservations();
// Afficher les réservations d'un hôtel
echo $hotel1->afficherStatut();



//echo $hotel2->afficherStatut();


// Afficher les réservations d'un client
//echo $client1->afficherReservations();
//echo $client2->afficherReservations();

// Afficher le statut des chambres d'un hôtel



// Micka MURMANN 
// Virgile GIBELLO



// Affiche les détails de l'objet $hotel1 en utilisant la méthode __toString() de la classe Hotel
// Le <br> est ajouté pour insérer un saut de ligne HTML après l'affichage
// echo $hotel1 . '<br>';
// $hotel1->chambresDisponibles();


// Affiche les informations de l'objet $reservation en utilisant la méthode __toString() de la classe Reservation
// Le <br> est ajouté pour insérer un saut de ligne HTML après l'affichage
// echo $hotel1->afficherReservations();
// echo $client1->afficherReservations();
// echo $hotel1 -> afficherStatut();


// Affiche les détails de l'objet $hotel2 en utilisant la méthode __toString() de la classe Hotel
// echo $hotel2;
// $hotel2->chambresDisponibles();




// var_dump(afficherReservation());



// $clientReservation1 = new Reservation($client1, "2", 11/03/2021, 15/03/2021);
// $clientReservation1 = new Reservation($client1, "2", 01/04/2021, 01/04/2021);
// $clientReservation2 =  new Reservation($client2, "2", 01/01/2021, 01/01/2021);

 


// echo $client1 -> afficherReservation() ;// Affichera les informations sur les objets  
// //j'appelle la fonction afficher reservation qui est dévclarer dans la classe client

// var_dump($client1);
// var_dump($client2);



