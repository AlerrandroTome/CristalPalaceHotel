<?php
    class QuartoModel{
        public $Id;
        public $Numero;
        public $valorDiaria;
        public $Status_Id;
        public $Status_Nome;

        public function QuartoModel($Id, $Numero, $vd,$Status_Id, $Status_Nome){
            $this->Id = $Id;
            $this->Numero = $Numero;
            $this->Status_Id = $Status_Id;
            $this->Status_Nome = $Status_Nome;
            $this->valorDiaria = $vd;
        }
    }
?>