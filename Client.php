<?php

class Client{
  private string $nom;                                                    // Nom du client
  private string $prenom;                                                 // Prénom du client
  private string $numeroTelephone;                                         // Numero de telephone du client
  private string $adresseMail;                                            // NumeroTelephone mail du client  
  private array $reservations;

  // Constructeur de la classe, appelé lors de la création d'un objet CompteBancaire
  public function __construct(string $nom, string $prenom, string $numeroTelephone, string $adresseMail){
  

        $this->nom = $nom;                                                // Définit le nom du client
        $this->prenom = $prenom;                                          // Définit le prénom du client
        $this->numeroTelephone = $numeroTelephone;                        // Définit la date de naissance
        $this->adresseMail = $adresseMail;                                // Définit le code postal de la ville              
        $this->reservations = [];  
    }                     
       
    //  pour obtenir le nom du client
    public function getNom() {

        return $this->nom;

    }

    //  pour définir le nom du client
    public function setNom(string $nom) {

        $this->nom = $nom;

    }

    //  pour obtenir le prénom du client
    public function getPrenom(): string {

        return $this->prenom;

    }


    //  pour définir le prénom du client 
    public function setPrenom(string $prenom) {

        $this->prenom = $prenom;

    }

    // cette fonction sert a acceder a la valeur d' un attribut de mon objet instancier client de la class client 
    public function getNumeroTelephone(): string {

        return $this->numeroTelephone;

    }

    // cette fonction sert a acceder a la valeur d' un attribut de mon objet instanciere client de la class client 
    public function setNumeroTelephone(string $numeroTelephone) {

        $this->numeroTelephone = $numeroTelephone;
    }

      //  pour définir le code postalm de la ville
    public function getAdresseMail(): string {

        return $this->adresseMail;

    }

    //  pour définir le code postale de la ville
    public function setAdresseMail(string $adresseMail) {

        $this->adresseMail = $adresseMail;

    }


    // si le tableau de reservation n'etais pas vide, tu retourne que c'est réserver sinon pas réserver
    //Cette fonction sert a ajouter chaque nouvelle reservation au tableeau de reservation deja existante 
    public function ajouterReservation( Reservation $reservation ){

        $this->reservations[] =  $reservation;
    }
    //Cette fonction est crée afin d'afficher les réservations qui ont été faites
    /*on parcours les reservation du tableau de reservation a l'aide d'un foreach 
    et on affiche ce que comporte une réservation */
//     public function afficherReservations(){

//         foreach ($this->reservations as $reservation){
//             echo $reservation->getClient()->getPrenom() . ' ' .$reservation->getClient()->getNom() .' - Chambre : '.$reservation->getChambre()->getnumChambre() . ' - Numéro de réservation : ' . $reservation->getNumeroReservation() . ' - Date du séjour: '
//             . $reservation->getDateDebut() . ' - ' . $reservation->getDateFin().  '<br>'."<br>" ;
//     }
// }



public function afficherReservations()
    {
 
       
 
        if (count($this->reservations) >= 1)
        {
          
            $totalPrix = 0;                             //initialisation du prix 
 
            foreach ($this->reservations as $reservation)
            {
                $chambre = $reservation->getChambre();
                $wifi = $chambre->getWifi() ? "Oui" : "Non"; //ici le lien avec le boolean est fais a la place de ture false
                $totalPrix += $chambre->getPrix();

                $result = "<b>Hôtel : " . $reservation->getChambre()->getHotel() . "</b> - Chambre " . $chambre->getnmChambre() . " (" . $chambre->getPrix() . "€ - Wifi : " . $wifi . ") - du " . $reservation->getDateDebut() . " au " . $reservation->getDateFin() . "</br>";
            //balise b pr ecrire en gras
            }
        $result .= "<h2>Réservations de $this</h2>" .'<div>' . count($this->reservations) . " RESERVATIONS</div>
        <p> Total : $totalPrix €</p>
        ";
      
        }
        else
        {
            $result = "Aucune réservation !";
        }

        return $result;
    }
   

    // Méthode magique appeler automatiquement jamais faire echo de __tostring
    public function __toString(): string {
    // Accède au numéro de la première chambre dans la première réservation (si disponible)
        // $numChambre = $this->reservations[0]->getChambre()->getnumChambre(); 
        
        return $this->nom;
    }
}

  
    
  
  
  

