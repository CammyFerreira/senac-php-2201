<?php

class Calculadora{

    private ?float $n1;
    private ?float $n2;


    //metodo mágico - executado automaticamente quando o objeto é iniciado
    public function __construct($n1, $n2){
        $this->n1 = $n1;
        $this->n2 = $n2;
    }

    public function soma(): ?float{

        return $this->n1 + $this->n2;
    }

    public function subtracao(): ?float{

        return $this->n1 - $this->n2;
    }

    //metodo mágico - executado automaticamente quando o objeto é destruído
    public function __destruct(){

    }
}