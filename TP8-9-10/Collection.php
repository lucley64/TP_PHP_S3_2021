<?php
    include "Disc.php";
    class Collection{
        ///ATTRIBUTS
        private $m_disques;
        private $m_nombreDisques;

        ///METHODES
        // Constructeur
        function __construct(){
            $this->m_disques = array();
            $this->m_nombreDisques = 0;
        }

        // Encapsulation
        public function setDisques($tabDisques){
            $this->m_disques = $tabDisques;
            $this->m_nombreDisques = sizeof($tabDisques);
        }

        public function getDisques(){
            return $this->m_disques;
        }

        public function getNombreDisques(){
            return $this->m_nombreDisques;
        }

        // Methodes usuelles
        public function loadFromQuerryPDO(PDOStatement $querry){
            while ($tuple = $querry->fetch()) {
                $disque = new Disc($tuple[0], $tuple[1], $tuple[2], $tuple[3], $tuple[4]);
                $this->addDisc($disque);
            }
        }

        public function loadFromQuerryMysqli(mysqli_result $querry){
            while ($tuple = mysqli_fetch_row($querry)) {
                $disque = new Disc($tuple[0], $tuple[1], $tuple[2], $tuple[3], $tuple[4]);
                $this->addDisc($disque);
            }
        }

        public function addDisc(Disc $disc){
            $this->m_disques[$this->m_nombreDisques] = $disc;
            $this->m_nombreDisques ++;
        }

        public function delDisc(int $indice){
            $this->m_nombreDisques --;
            unset($this->m_disques[$indice]);
        }

        public function getDisc(int $indice){
            return $this->m_disques[$indice];
        }
    }
?>