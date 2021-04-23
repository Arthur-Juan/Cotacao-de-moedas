# Aplicação de cotação de moedas em PHP com orientação a objeto 
<hr>

##  💻 Projeto

O projeto recebe a entrada de um usuário, com as moedas selecionadas, e a aplicação consome os valores atuais em uma API publica, a awasomeAPI.

Link da API:  \[https://docs.awesomeapi.com.br/api-de-moedas/)

# Orientação a objetos
<hr>

A aplicação tem duas classes principais para seu funcionamento, API/Server.php e Moedas/Moeda.php.

### API/Server.php
Essa classe é responsável por fazer a comunicação com a API, utilizando a query requerida pelo usuário, eviando para a API e retornando o JSON de dados.

### Modeas/Moeda.php
Essa classe é responsável por trabalhar com as informações da moeda, ela monta a query baseado nas entradas do usuário e a envia para a classe da API fazer suas operações, e com os dados retornados, a classe também realiza os cálculos necessários para retornar a reposta para o usuário/
