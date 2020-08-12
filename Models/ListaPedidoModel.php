<?php
    class ListaPedidoModel{
        public $Id;
        public $StatusId;
        public $QuartoNumero;
        public $StatusNome;
        public $ClienteNome;
        public $InicioEstadia;
        public $FimEstadia;
        public $Pedido;
        public $Confirmacao;
        public $Valor;

        public function ListaPedidoModel($IdQuarto,$Id, $StatusPedido, $QuartoNumero, 
        $InicioEstadia, $FimEstadia, $Pedido, $Valor,$Confirmacao){
            $this->IdQuarto = $IdQuarto;
            $this->Id = $Id;
            $this->StatusPedido = $StatusPedido;
            $this->QuartoNumero = $QuartoNumero;
            $this->InicioEstadia = $InicioEstadia;
            $this->FimEstadia = $FimEstadia;
            $this->Valor = $Valor;
            $this->Confirmacao = $Confirmacao;
        }
    }
?>