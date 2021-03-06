<?php
    // Klassendefinition
    class KoAbfall extends IPSModule {
 
        // Der Konstruktor des Moduls
        // Überschreibt den Standard Kontruktor von IPS
        public function __construct($InstanceID) {
            // Diese Zeile nicht löschen
            parent::__construct($InstanceID);
 
            // Selbsterstellter Code
        }
 
        // Überschreibt die interne IPS_Create($id) Funktion
        public function Create() {
            // Diese Zeile nicht löschen.
            parent::Create();
                    
        }
        
 
        // Überschreibt die intere IPS_ApplyChanges($id) Funktion
        public function ApplyChanges() {
            // Diese Zeile nicht löschen
            parent::ApplyChanges();
            
                      
        }
        
        public function Destroy()
        {
            //Timer entfernen
            //$this->UnregisterTimer("Update");

            //Never delete this line!!
            parent::Destroy();
        }
        
        
        
        /**
        * Die folgenden Funktionen stehen automatisch zur Verfügung, wenn das Modul über die "Module Control" eingefügt wurden.
        * Die Funktionen werden, mit dem selbst eingerichteten Prefix, in PHP und JSON-RPC wiefolgt zur Verfügung gestellt:
        *
        * ABC_MeineErsteEigeneFunktion($id);
        *
        */
        public function MeineErsteEigeneFunktion() {
            // Selbsterstellter Code
        }
        
        protected function GetParent()
        {
            $instance = IPS_GetInstance($this->InstanceID);
            return ($instance['ConnectionID'] > 0) ? $instance['ConnectionID'] : false;
        }
    }
?>