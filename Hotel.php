<?php

class Hotel{
    private string $nomHotel;                                   // propriété dans la class hotel Nom Hotel
    private string $adresse;                                    // propriété dans la class hotel Adresse postale
    private string $codePostal;                                 // propriété dans la class hotel Code postal de la ville*
    private string $ville;                                      // propriété dans la class hotel Nom de la ville             
    private array $chambres;                                    //propriété dans la class hotel tableau de chambres 
    private array $reservations = [];                           //propriété dans la class hotel tableau de réservations
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

// cette fonction sert a acceder a la valeur d' un attribut de mon objet instancier
          public function getAdresse(): string {

            return $this->adresse;
    
        }
    
// Cela permet de modifier  la valeur d' un attribut de mon objet instancier et uniquement cela
        public function setAdresse(string $adresse) {
    
            $this->adresse = $adresse;
    
        }
    
    
// cette fonction sert a acceder a la valeur d' un attribut de mon objet instancier
    public function getCodePostal(): string {

        return $this->codepostal;

    }

// cette fonction sert a acceder a la valeur d' un attribut de mon objet instanciere hotel de la class hotel 
    public function setCodePostal(string $codePostal) {

        $this->codePostal = $codePostal;

    }

// cette fonction sert a acceder a la valeur d' un attribut de mon objet instancier
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
    

//Cette fonction va permettre de push les nouvelle reservation dans notre tableau de réservation
     public function ajouterReservation(Reservation $reservation) {
        $this->reservations[] = $reservation;
    }

//Cette fonction va permettre de compter le nombre de réservations 
    public function compterReservations() {
        return count($this->reservations);
    }

    public function chambresDisponibles() {
     // Compte les chambre disponible
        $chambresDisponibles = count($this->chambres) - count($this->reservations);
        return  $chambresDisponibles;
    
    }
       
    public function afficherInformations(){
        $nbChambres = count($this->chambres);
        $nbChambresReservees = count($this->reservations);

 
        $result = "Nombre de Chambres : $nbChambres</br>" ;
        "Nombre de Chambres réservées :". $nbChambresReservees."</br>";
        "Nombre de Chambres disponibles : " . ($nbChambres - $nbChambresReservees) . "</p>";
 
 
        return $result;
    }
 
    // Affiche les réservations de cet hôtel
    public function afficherReservations()
    {
        $totalReservations = count($this->reservations);
 
       
 
        if ($totalReservations >= 1)
        {
          
            $totalPrix = 0;                             //initialisation du prix 
 
            foreach ($this->reservations as $reservation)
            {
                $chambre = $reservation->getChambre();
                $wifi = $chambre->getWifi() ? "Oui" : "Non";
                $totalPrix += $chambre->getPrix();
                $result = "<b>Hôtel : " . $reservation->getChambre()->getHotel() . "</b> - Chambre " . $chambre->getNmChambre() . " (" . $chambre->getPrix() . "€ - Wifi : " . $wifi . ") - du " . $reservation->getDateDebut() . " au " . $reservation->getDateFin() . "</br>";
            //balise b pr ecrire en gras
            }
        $result .= "<h2>Réservations de $this</h2>" .'<div>' . $totalReservations . " RESERVATIONS</div>
        <p> Total : $totalPrix €</p>
        ";
      
        }
        else
        {
            $result= "Aucune réservation !";
        }

        return $result;
    
    }
 
    public function afficherStatut() 
    {
        // Trie les chambres en utilisant une méthode de comparaison personnalisée (TriParChambre)
        // usort($this->chambres, array($this, "TriParChambre"));
    
        // Initialise une chaîne HTML pour afficher le statut des chambres
        $result = "<h2>Statut des chambres de $this</h2>
    <table> <!-- Début du tableau pour afficher les informations des chambres -->
    <thead> <!-- En-tête du tableau -->
    <tr> <!-- Ligne de l'en-tête du tableau -->
    <th>CHAMBRE</th> <!-- Cellule d'en-tête pour le numéro de la chambre -->
    <th>PRIX</th> <!-- Cellule d'en-tête pour le prix de la chambre -->
    <th>WIFI</th> <!-- Cellule d'en-tête pour indiquer la disponibilité du Wi-Fi -->
    <th>DISPONIBILITE</th> <!-- Cellule d'en-tête pour l'état de disponibilité de la chambre -->
    </tr>
    </thead>
    <tbody> <!-- Corps du tableau, où les informations des chambres seront ajoutées -->";
    
        // Boucle à travers chaque chambre pour en afficher les informations dans le tableau
        foreach ($this->chambres as $chambre)
        {
            // Vérifie si la chambre dispose de Wi-Fi, et affecte "OUI" ou "NON" en conséquence
            $wifi = $chambre->getWifi() ? '<div>OUI</div>' : '<div>NON</div>';
    
            // Vérifie si la chambre est disponible, et affecte "Disponible" ou "Réservée" en conséquence
            $disponible = $chambre->getDisponibilite() ? '<div>Disponible</div>' : '<div>Réservée</div>';
    
            // Ajoute une ligne au tableau pour la chambre actuelle
            $result .= "
    <tr> <!-- Nouvelle ligne pour afficher les informations de la chambre -->
    <td><b>Chambre " . $chambre->getNmChambre() . "</b></td> <!-- Cellule pour le numéro de la chambre -->
    <td>" . $chambre->getPrix() . "€</td> <!-- Cellule pour le prix de la chambre avec le symbole € -->
    <td>$wifi</td> <!-- Cellule pour afficher si le Wi-Fi est disponible (OUI ou NON) -->
    <td>$disponible</td> <!-- Cellule pour afficher l'état de la chambre (Disponible ou Réservée) -->
    </tr>";
        }
    
        // Termine le corps et le tableau HTML
        $result .= "
    </tbody> <!-- Fin du corps du tableau -->
    </table> <!-- Fin du tableau -->";
    
        // Retourne le code HTML complet pour l'affichage
        return $result;
    }



    
    // La méthode magique nous permet d'afficher le nom de l'hotel, la ville l'adresse, le nombre de chambre ainsi que le nombre de réservation 
    public function __toString(): string {
        return  "$this->nomHotel**** $this->ville<br>";
        
        // . $this->adresse. ' ' .$this ->codePostal. ' ' .$this ->ville."<br>"

        // .'Total des chambres : '. count($this->chambres) ."<br> Chambre Réservées : ".count($this->reservations). "<br> Chambre disponibles : ".$this ->chambresDisponibles() ."<br>"."<br>".
          
        // "Réservations de l'hotel "."$this->nomHotel **** $this->ville".'<br>' . " Réservations".'  '. count($this->reservations) ;
    }
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
