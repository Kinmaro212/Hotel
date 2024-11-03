<?php

class Chambre{
    private string $nmChambre;                          // Numéro de chambre
    private int $nbLit ;                                // Nombre de Lit 
    private float $prix ;                               // Prix de la chambre
    private bool $wifi;                                 // Option Wifi
    private bool $disponibilite;                        // Disponibilité des chambres
    private array $reservations;                      
    private Hotel $hotel;
    // Constructeur de la classe, appelé lors de la création des objets Chambre

    public function __construct(string $nmChambre,int $nbLit, float $prix, bool $wifi, bool $disponibilite, Hotel $hotel){
    

        $this->nmChambre = $nmChambre;                // Définit le numéro de chambre
        $this->nbLit = $nbLit;                        // Définit le nombre de lit
        $this->prix = $prix;                          // Définit le prix de la chambre                    
        $this->wifi = $wifi; 
        $this->hotel = $hotel;
        $this ->disponibilite = $disponibilite;                         // Définit l'option wifi dans la chambre
        $this->reservations = [];  
        $hotel -> ajouterChambre($this);

  
    }                    
      
    //  pour obtenir le numéro de chambre
    public function getNmChambre(): string {

        return $this->nmChambre;


    }

    //  pour définir le numéro de chambre
    public function setNmChambre(string $nmChambre) {

        $this->nmChambre = $nmChambre;

    }
    public function getNbLit(): int {

        return $this->nbLit;

    }

    //  pour définir le numéro de chambre
    public function setNbLit(int $nbLit) {

        $this->nbLit= $nbLit;

    }

    public function getPrix(): float {

        return $this->prix;

    }

    //  pour définir le code postale de la wifi
    public function setPrix(float $prix) {

        $this->prix = $prix;

    }
    //  pour obtenir le nom de la wifi
    public function getWifi(): bool {

        return $this->wifi;

    }

    //  pour définir le nom de la wifi
    public function setWifi(bool $wifi) {

        $this->wifi = $wifi;

    }

        //  pour obtenir le nom de la wifi
        public function getDisponibilite(): bool {

            return $this->disponibilite;
    
    }
    
        //  pour définir le nom de la wifi
        public function setDisponibilite(bool $disponibilite) {
    
            $this->disponibilite = $disponibilite;
    
    }

     //  pour obtenir le numéro de réservation
     public function getHotel(){

        return $this->hotel;
    }


    //  pour définir le numéro de réservation 
    public function setHotel($hotel) {

        $this->hotel = $hotel;
    }

        public function ajouterReservation( Reservation $reservation ){

            $this->reservations[] =  $reservation;
    }

    

}