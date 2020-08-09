<?php
    class PedidoModel{
        public $Id;
        public $StatusId;
        public $QuartoNumero;
        public $StatusNome;
        public $ClienteNome;
        public $InicioEstadia;
        public $FimEstadia;
        public $Pedido;
        public $Confirmado;
        public $Confirmacao;
        public $Valor;

        public function PedidoModel($Id, $StatusId, $QuartoNumero,$StatusNome, $ClienteNome, 
        $InicioEstadia, $FimEstadia, $Pedido, $Valor, $Confirmado, $Confirmacao){
            $this->Id = $Id;
            $this->StatusId = $StatusId;
            $this->StatusNome = $StatusNome;
            $this->ClienteNome = $ClienteNome;
            $this->QuartoNumero = $QuartoNumero;
            $this->InicioEstadia = $InicioEstadia;
            $this->FimEstadia = $FimEstadia;
            $this->Pedido = $Pedido;
            $this->Confirmado = $Confirmado;
            $this->Valor = $Valor;
            $this->Confirmacao = $Confirmacao;
        }
    }
?>