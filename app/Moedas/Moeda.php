<?php

namespace app\Moedas;


class Moeda{


    //https://economia.awesomeapi.com.br/all/moedas
    /**
     * Nome das moedas
     */
    private $valor;
    private $moedas;
    private $cotacoes;
    private $resultado = '';


    // private function test_input($data){
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    // }
    // usar htmlspecialchars nos parametros get pra evitar XSS

  public function getCotacoes(){
        return $this->cotacoes;
    }

    public function setMoedas($moedas){
        $this->moedas = $moedas;
    }

    public function getMoedas(){
        return $this->moedas;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getResultado(){
        return $this->resultado;
    }

    public function getValor(){
        return $this->valor;
    }


    

    /**
     * Método responsável por limpar a query
     * @param string query
     * @return string newQuery
     */
    private function cleanQuery($query){
        $newQuery = rtrim($query, ', ');
        return $newQuery;
    }


    public function getCotacao($resultDecode){
        $name = str_replace("-BRL", '', $this->moedas);
        
    
        $conversao = array();
        foreach($name as $key){
            $objetoMoeda = $resultDecode->{$key};
            $conversao[$key] = $objetoMoeda->low;

            }        
        $this->cotacoes =  $conversao;
    }
    

    /**
     * Método responsável por fazer a cotação das moedas
     * @param array cortacoes
     * 
     */
    public function calculate($cotacoes){

    //ADICIONAR NOVAS MOEDAS AQUI
     $dolReal= array("DOL", null);
     $eurReal= array("EUR", null);
     $btcReal= array("BTC", null);
     $libraReal = array("GBP", null);
     $ieneReal = array("JPY", null);
    $resultado ='';
    
        
    if(array_key_exists('EUR', $cotacoes)){
        $eurReal[1] = floatval($this->valor) * $cotacoes['EUR'];
    }

    if(array_key_exists('USD', $cotacoes)){
        $dolReal[1] = floatval($this->valor) * $cotacoes['USD'];
    }


    
    if(array_key_exists('BTC', $cotacoes)){
        $btcReal[1] = floatval($this->valor) * $cotacoes['BTC'];
    }
    
    if(array_key_exists('GBP', $cotacoes)){
        $libraReal[1] = floatval($this->valor) * $cotacoes['GBP'];
    }

    if(array_key_exists('JPY', $cotacoes)){
        $ieneReal[1] = floatval($this->valor) * $cotacoes['JPY'];
    }

        
        //ADICIONAR var da moeda aqui
        $aux = array($dolReal, $eurReal, $btcReal, $libraReal, $ieneReal);
        foreach($aux as $key){
            if($key[1] != null){
            
            $resultado .= 'R$ '. number_format($this->valor, 2, ',', '.') .' : '. $key[0] .' '. number_format($key[1], 2, ',', '.'). "<br>  ";
            }
        }
        
        $this->resultado = $resultado;
    }
   
}
