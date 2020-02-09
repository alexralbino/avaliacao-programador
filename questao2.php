<?php

function criptografarFrase($frase){ // Função para criptografar a mensagem
  $frase = preg_replace_callback('/([a-zA-Z])/',function($matches){
    return chr(ord($matches[0]) + 3);
  },$frase);// regex para adicionar +3 ao ascii de todas as letras
  $frase = ltrim(strrev($frase));// inverte a linha/remove espaços em branco no inicio
  $half = (int)((strlen($frase)/2));
  $left = substr($frase, 0, $half);
  $right = substr($frase, $half);
  $right = preg_replace_callback('/(.)/',function($matches){
    return chr(ord($matches[0]) - 1);
  },$right);//regex para adicionar -1 ao ascii da metade para frente
  $frase = $left . $right;// Junta as duas partes da frase
  echo $frase . "<br>";
}

$file = file("teste2.txt");// Arquivo de entrada
$max = -1;
$i = 0;
foreach ($file as $line){//Laço para pegar cada linha do arquivo
  (($i < $max)?criptografarFrase($line):null);// operador ternario para passar por todas as linhas do arquivo
  (($max < 0)?$max = (int)$line + 1:null);//operador ternario para determinar o número de linhas a serem tratadas
  $i++;
}

 ?>
