<?php

class Chambre{
    private int $nbLit ;                                // Propriété Nombre de Lit 
    private string $nmChambre;                          // Propriété Numéro de chambre
    private float $prix ;                               // Propriété Prix de la chambre
    private bool $wifi;                                 // Propriété Option Wifi
    private bool $disponibilite;                        // Propriété Disponibilité des chambres
    private array $reservations;                        // Propriété tableau de réservation des chambres             
    private Hotel $hotel;
    // Constructeur de la classe, appelé lors de la création des objets Chambre

    public function __construct(string $nmChambre,int $nbLit, float $prix, bool $wifi, bool $disponibilite, Hotel $hotel){
    

        $this->nmChambre = $nmChambre;                 // Définit le numéro de chambre
        $this->nbLit = $nbLit;                         // Définit le nombre de lit
        $this->prix = $prix;                           // Définit le prix de la chambre                    
        $this->wifi = $wifi;                           // Définit l'option wifi dans la chambre
        $this->hotel = $hotel;                         // Définit hotel hotel dans la chambre pr acceder a hotel
        $this ->disponibilite = $disponibilite;        // Définit disponibilité de la chambre                 
        $this->reservations = [];                      // Définit un tableau de réservation
        $hotel -> ajouterChambre($this);

  
    }                    
      
// cette fonction sert a acceder a la valeur d' un attribut de mon objet instancier chambre de la class chambre 
    public function getNmChambre(): string {

        return $this->nmChambre;


    }

// cette fonction sert a modifier a la valeur d' un attribut de mon objet instancier chambre de la class chambre 
    public function setNmChambre(string $nmChambre) {

        $this->nmChambre = $nmChambre;

    }
    
// cette fonction sert a acceder a la valeur d' un attribut de mon objet instancier chambre de la class chambre 
    public function getNbLit(): int {

        return $this->nbLit;

    }

// cette fonction sert a modifier a la valeur d' un attribut de mon objet instancier chambre de la class chambre 
    public function setNbLit(int $nbLit) {

        $this->nbLit= $nbLit;

    }
// cette fonction sert a acceder a la valeur d' un attribut de mon objet instancier chambre de la class chambre 

    public function getPrix(): float {

        return $this->prix;

    }

// cette fonction sert a modifier a la valeur d' un attribut de mon objet instancier chambre de la class chambre
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

    public function __tostring(){

    }

}