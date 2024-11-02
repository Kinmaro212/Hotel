<?php

class Reservation{
    private Client $client;                                                 //  le client sur la reservation 
    private string $numeroReservation;                                      //  le numéro de réservation
    private DateTime $dateDebut;                                            //  la date de début de séjour réservé
    private DateTime $dateFin;                                              //  la date de fin de séjour réservé
    private Chambre $chambre;


    public function __construct(Client $client, string $numeroReservation, string $dateDebut, string $dateFin, Chambre $chambre){

        $this->client = $client;                                    // Définit le client
        $this->numeroReservation = $numeroReservation;              // Définit le numéro de réservation
        $this->dateDebut = new DateTime($dateDebut);                // Définit la date de début
        $this->dateFin = new DateTime($dateFin); // Définit la date de fin   
        $this->chambre = $chambre;
        // ceci permet d'ajouter automatiquement la réservation à l’hôtel auquel la chambre appartient dès que la réservation est créée
        //j'ai accès à la classe chambre grace à la variable $chambre . Donc j'ai accès à ses methodes publiques                       
        $client -> ajouterReservation($this);
        $chambre -> getHotel() -> ajouterReservation($this); 
                                
    }   
    //  pour obtenir le client
    public function getclient() {

        return $this->client;
    }

    //  pour définir le client
    public function setclient(Client $client) {

        $this->client = $client;
    }

    //  pour obtenir le numéro de réservation
    public function getnumeroReservation(): string {

        return $this->numeroReservation;
    }


    //  pour définir le numéro de réservation 
    public function setnumeroReservation(string $numeroReservation) {

        $this->numeroReservation = $numeroReservation;
    }
    //  pour définir le code postalm de la ville
    public function getDateDebut(): string {

        return $this->dateDebut->format("d-m-Y");
        }
    
        //  pour définir le code postale de la ville
        public function setDateDebut(string $dateDebut) {
    
            $this->dateDebut = $dateDebut;
    }
      //  pour définir le code postal de la ville
    public function getdateFin(): string {

        return $this->dateFin->format("d-m-Y");
    }

    //  pour définir le code postale de la ville
    public function setdateFin(string $dateFin) {

        $this->dateFin = $dateFin;
    }

    public function getChambre() {

        return $this->chambre;

    }


    //  pour définir le chambre du client 
    public function setChambre( $chambre) {

        $this->chambre = $chambre;

    }
    

// La méthode magique nous permet d'afficher le nom de l'hotel, le client, le numéro de réservation, la date du début de séjour et la date de fin ainsi que le nombre de réservation 
    public function __toString(): string {
// Pr acceder nomhotel j'appelle chambre ensuite nomhotel 
        return "Réservation de l'hotel ". ' ' . $this->chambre->getHotel()->getNomHotel(). '<br>' ."$this->client".' '."<br> Numéro de réservation :
        ".' '.  $this->numeroReservation . '<br> Date séjour: ' . $this->getDateDebut() . ' au  '
         . $this ->getDateFin().' <br>';
    
    }


}