<?php

class Hotel{
    private string $nomHotel;                                   // Nom Hotel
    private string $adresse;                                    // Adresse postale
    private string $codePostal;                                 // Code postal de la ville*
    private string $ville;                                      // Nom de la ville             
    private array $chambres;
    private array $reservations = [];
//propriété dans la class hotel 


    // Constructeur de la classe, appelé lors de la création d'un objet hotel c'est une méthode magique 
    public function __construct(string $nomHotel, string $adresse, string $codePostal, string $ville) {

        $this->nomHotel = $nomHotel;                        // Définit le nom de l'hotel
        $this->adresse = $adresse;                          // Définit la date de naissance
        $this->codePostal = $codePostal;                    // définit le code postal de la ville                    
        $this->ville = $ville;                              // Définit la ville ou se situe l'hotel
        $this->chambres = [];
    }   
    // cette fonction sert a acceder a la valeur d' un attribut de mon objet instancier
    public function getNomHotel() {

        return $this->nomHotel;

    }

    // Cela permet de modifier  la valeur d' un attribut de mon objet instancier et uniquement cela
    public function setNomHotel(string $nomHotel) {

        $this->nomHotel = $nomHotel;

    }

          //  pour définir le code postalm de la ville
          public function getAdresse(): string {

            return $this->adresse;
    
        }
    
        //  pour définir le code postale de la ville
        public function setAdresse(string $adresse) {
    
            $this->adresse = $adresse;
    
        }
    
    
      // cette fonction sert a acceder a la valeur d' un attribut de mon objet instancier hotel de la class hotel 
    public function getCodePostal(): string {

        return $this->codepostal;

    }

    // cette fonction sert a acceder a la valeur d' un attribut de mon objet instanciere hotel de la class hotel 
    public function setCodePostal(string $codePostal) {

        $this->codePostal = $codePostal;
    }
    //  pour obtenir le nom de la ville
    public function getVille(): string {

        return $this->Ville;

    }

    //  pour définir le nom de la ville
    public function setVille(string $ville) {

        $this->ville = $ville;

    }

    //Ajouter chambre va me servir a ajouter une chambre dans mon tableau de chambres et donc push les chambre dans ce tableau qui appartient a l'hotel en question
    public function ajouterChambre(Chambre $chambre ){

        $this->chambres[] =  $chambre;


    }
    /*cette fonction va me servir a afficher les chambre avec leur caracteristique
     ainsi que le nombre total de chambre au sein de l'hotel 
     On fais un foreach pr lire chaque chambre du tableau de chambres 
     et on affiche les caracteristique de chaque chambre*/
    // public function afficherChambres() {
    //     foreach($this->chambres as $chambre) {
    //         echo $chambre->getNmChambre() . ' (' . $chambre->getNbLit() . ') : ' . $chambre->getPrix() . " " . $chambre->getWifi() . "" . $chambre->getDisponibilite().' €<br>';

    //     }
    // }

     // Fonction pour ajouter une réservation
     public function ajouterReservation(Reservation $reservation) {
        $this->reservations[] = $reservation;
    }

    // Fonction pour compter le nombre de réservations dans l'hôtel
    public function compterReservations(): int {
        return count($this->reservations);
    }

    public function __toString(): string {
        $nombreReservations = $this->compterReservations();
        $texteReservations = $nombreReservations > 0 
            ? "Nombre de réservations : $nombreReservations"
            : "Aucune réservation dans cet hôtel.";

        return "{$this->nomHotel} **** {$this->ville}<br>" .
               "{$this->adresse}<br>" .
               "Nombre de chambres : " . count($this->chambres) . "<br>" .
               $texteReservations;
    }
}