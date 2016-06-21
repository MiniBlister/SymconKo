<?php
    // Klassendefinition
    class NovSplitter extends IPSModule {
 
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
            
            //Always create our own Client Server, when no parent is already available
            $this->RequireParent("{3CFF0FD9-E306-41DB-9B5A-9D06D38576C3}", "Novelan Client");
            $this->RegisterPropertyString("Host", "192.168.178.4");
            $this->RegisterPropertyBoolean("Open", false);
            $this->RegisterPropertyInteger("Port", 9090);
            
 
        }
 
        // Überschreibt die intere IPS_ApplyChanges($id) Funktion
        public function ApplyChanges() {
            // Diese Zeile nicht löschen
            parent::ApplyChanges();
            
            $change = false;
            // Zwangskonfiguration des ClientSocket
            $ParentID = $this->GetParent();
            
            if (!($ParentID === false))
            {
                if (IPS_GetProperty($ParentID, 'Host') <> $this->ReadPropertyString('Host'))
                {
                    IPS_SetProperty($ParentID, 'Host', $this->ReadPropertyString('Host'));
                    $change = true;
                }
                if (IPS_GetProperty($ParentID, 'Port') <> $this->ReadPropertyInteger('Port'))
                {
                    IPS_SetProperty($ParentID, 'Port', $this->ReadPropertyInteger('Port'));
                    $change = true;
                }
                $ParentOpen = $this->ReadPropertyBoolean('Open');
                // Keine Verbindung erzwingen wenn Host leer ist, sonst folgt später Exception.

                if (IPS_GetProperty($ParentID, 'Open') <> $ParentOpen)
                {
                    IPS_SetProperty($ParentID, 'Open', $ParentOpen);
                    $change = true;
                }
                if ($change)
                {
                    @IPS_ApplyChanges($ParentID);
                }
            }
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
    }
?>