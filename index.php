<?php

require __DIR__.'/vendor/autoload.php';

use \App\Moedas\Moeda;
use \App\API\Server;

include __DIR__.'/includes/header.php';


$obMoeda = new Moeda();
$obServer = new Server();
$mensagem = '';
 


    if(isset($_GET['coin'], $_GET['valor'])){
    $obMoeda->setMoedas($_GET['coin']);
    $obMoeda->setValor($_GET['valor']);
    $obMoeda->getCotacao($obServer->xhr($obServer->makeUrl($obMoeda->getMoedas())));
    $obMoeda->calculate($obMoeda->getCotacoes());  
     
    $resultado = ($obMoeda->getResultado()); 
    
    
}

elseif(isset($_GET['valor']) && !isset($_GET['coin'])){
$mensagem = '<div class="alert alert-danger">Selecione a moeda!</div>';
}




include __DIR__.'/includes/cotacao.php';

include __DIR__.'/includes/footer.php';