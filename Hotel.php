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

        return $this->codePostal;

    }

// cette fonction sert a acceder a la valeur d' un attribut de mon objet instanciere hotel de la class hotel 
    public function setCodePostal(string $codePostal) {

        $this->codePostal = $codePostal;

    }

// cette fonction sert a acceder a la valeur d' un attribut de mon objet instancier
    public function getVille(): string {

        return $this->ville;

    }

//  pour définir le nom de la ville
    public function setVille(string $ville) {

        $this->ville = $ville;

    }

    public function getReservations(){
        return $this->reservations;
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

 
        $result = $this->__toString()."Nombre de Chambres : $nbChambres</br>".
        "Nombre de Chambres réservées :". $nbChambresReservees."</br>".
        "Nombre de Chambres disponibles : " . ($nbChambres - $nbChambresReservees) . "</p>";
        return $result;
    }

 
    // Affiche les réservations de cet hôtel
    public function afficherReservations()
    {
        $totalReservations = count($this->reservations);
        $result = "<h2>Réservations de l'hôtel ".$this->nomHotel."****" .$this->ville.'</h2>' ;
 
        if ($totalReservations >= 1)
        {
          
            $totalPrix = 0;                             //initialisation du prix 
            $result.= "<div>"."$totalReservations"." RESERVATIONS" ."</div>";
            foreach ($this->reservations as $reservation)
            {
                $client = $reservation->getclient();
                $chambre = $reservation->getChambre();
                $result .= $client . " - Chambre " . $chambre->getNmChambre() . " - du " . $reservation->getDateDebut() . " au " . $reservation->getDateFin() . "<br>";
            //balise b pr ecrire en gras
            }

      
        }
        else
        {
            $result.= "<div>Aucune réservation !</div>";
        }
        return $result;
    
    }
 
    public function afficherStatut() 
    {

    
        // Initialise une chaîne HTML pour afficher le statut des chambres

        // <!-- Début du tableau pour afficher les informations des chambres -->
        // <!-- En-tête du tableau -->
        // <!-- Ligne de l'en-tête du tableau -->
        // -- Cellule d'en-tête pour le numéro de la chambre -->
        // <!-- Cellule d'en-tête pour le prix de la chambre -->
        // <!-- Cellule d'en-tête pour indiquer la disponibilité du Wi-Fi -->
        // <!-- Cellule d'en-tête pour l'état de disponibilité de la chambre -->
        // <!-- Corps du tableau, où les informations des chambres seront ajoutées -->"


        $result = "<h2>Statut des chambres de". $this->getNomHotel()." **** ". $this->getVille() . "</h2>
            <table>
            <thead>
            <tr>
            <th>CHAMBRE</th> 
            <th>PRIX</th>
            <th>WIFI</th>
            <th>DISPONIBILITÉ</th>
            </tr>
            </thead>
            <tbody>";
    
        // Boucle à travers chaque chambre pour en afficher les informations dans le tableau
        foreach ($this->chambres as $chambre)

        {

        // Vérifie si la chambre dispose de Wi-Fi, et affecte "OUI" ou "NON" en conséquence
            $wifi = $chambre->getWifi() ? '<div>OUI</div>' : '<div>NON</div>';
    
        // Vérifie si la chambre est disponible, et affecte "Disponible" ou "Réservée" en conséquence
            $disponible = $chambre->getDisponibilite() ? '<div>Disponible</div>' : '<div>Réservée</div>';
    
        // Ajoute une ligne au tableau pour la chambre actuelle
        // <!-- Nouvelle ligne pour afficher les informations de la chambre -->
        //  <!-- Cellule pour le numéro de la chambre -->
        // <!-- Cellule pour le prix de la chambre avec le symbole € -->
        //  <!-- Cellule pour afficher si le Wi-Fi est disponible (OUI ou NON) -->
        //  <!-- Cellule pour afficher l'état de la chambre (Disponible ou Réservée) -->
            $result .= 
    "<tr> 
    <td><b>Chambre " . $chambre->getNmChambre() . "</b></td>
    <td>" . $chambre->getPrix() . "€</td> 
    <td>$wifi</td>
    <td>$disponible</td>
    </tr>";
        }
    
        // Termine le corps et le tableau HTML
        $result .= "
    </tbody>
    </table>" ;
    
        // Retourne le code HTML complet pour l'affichage
        return $result;
    }



    
    // La méthode magique nous permet d'afficher le nom de l'hotel, la ville l'adresse, le nombre de chambre ainsi que le nombre de réservation 
    public function __toString(): string {
        return  "<b>$this->nomHotel**** $this->ville<br></b>". $this->adresse. ' ' .$this ->codePostal. ' ' .$this ->ville."<br>";

        // .'Total des chambres : '. count($this->chambres) ."<br> Chambre Réservées : ".count($this->reservations). "<br> Chambre disponibles : ".$this ->chambresDisponibles() ."<br>"."<br>".
          
        // "Réservations de l'hotel "."$this->nomHotel **** $this->ville".'<br>' . " Réservations".'  '. count($this->reservations) ;
    }
}    
