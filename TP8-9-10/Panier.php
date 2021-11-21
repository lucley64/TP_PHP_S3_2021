<?php
    class Panier{
        ///ATTRIBUTS
        private $m_nombreItems;
        private $m_items;


        ///METHODES
        // Constructeur
        function __construct(){
            $this->m_items = array();
            $this->m_nombreItems = 0;
        }

        public function addItem($disc){
            $this->m_items[$this->m_nombreItems] = $disc;
            $this->m_nombreItems ++;
        }

        public function delItem($indice){
            for ($i = $indice ; $i < $this->m_nombreItems - 1; $i++){
                $this->m_items[$i] = $this->m_items[$i + 1];
            }
            unset($this->m_items[$i]);
            $this->m_nombreItems --;
        }

        public function vider(){
            $this->m_items = array();
            $this->m_nombreItems = 0;
        }

        public function getItems(){
            return $this->m_items;
        }

        public function getNbItems(){
            return $this->m_nombreItems;
        }

        public function getItem(int $indice)
        {
            return $this->m_items[$indice];
        }
    }
?>