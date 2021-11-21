<?php
    class Disc{
        ///Attributs
        private $m_titre;
        private $m_auteur;
        private $m_genre;
        private $m_prix;
        private $m_couverture;

        ///METHODES
        // Constructeur
        function __construct($titre = null, $auteur = null, $genre = null, $prix = null, $couverture = null){
            $this->setTitre($titre);
            $this->setAuteur($auteur);
            $this->setGenre($genre);
            $this->setPrix($prix);
            $this->setCouverture($couverture);
        }

        // Encapsulation
        public function setTitre($titre){
            $this->m_titre = $titre;
        }

        public function getTitre(){
            return $this->m_titre;
        }

        public function setAuteur($auteur){
            $this->m_auteur = $auteur;
        }

        public function getAuteur(){
            return $this->m_auteur;
        }

        public function setGenre($genre){
            $this->m_genre = $genre;
        }

        public function getGenre(){
            return $this->m_genre;
        }

        public function setPrix($prix){
            $this->m_prix = $prix;
        }

        public function getPrix(){
            return $this->m_prix;
        }

        public function setCouverture($couverture){
            $this->m_couverture = $couverture;
        }

        public function getCouvertureMin(){
            return "images/".$this->m_couverture."_Min.jpg";
        }

        public function getCouvertureMax(){
            return "images/".$this->m_couverture."_Max.jpg";
        }

        public function DiscToBDPDO(PDO $connexionPDO) {
            $connexionPDO->exec("INSERT INTO VentesCD VALUES ($this->m_titre, $this->m_auteur, $this->m_genre, $this->m_prix, $this->m_couverture)");
        }
        
        public function toString()
        {
            return "$this->m_titre,$this->m_auteur,$this->m_genre,$this->m_prix,$this->m_couverture";
        }
    }
?>