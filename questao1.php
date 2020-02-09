<?php

function leapYear($year){// Função para descobrir se é leap year
  $leap = date('L', mktime(0, 0, 0, 1, 1, $year));// date('L') verifica se $year é um leap year
  if($leap){
    echo "This is a leap year.<br>";
    return True;
  }else{
    return False;
  }
}

function huluculu($year){// Função para descobrir é ano de huluculu
  if(($year % 15) == 0){
    echo "This is huluculu festival year.<br>";
    return true;
  }else{
    return false;
  }
}

function bulukulu($year){ //Função para descobrir se é ano de bulukulu
  if($year%55 == 0){
    echo "This is a bulukulu festival year.<br>";
    return true;
  }else{
    return false;
  }
}

$file = file("teste.txt");// Arquivo de entrada

foreach ($file as $line){//Laço para pegar cada linha do arquivo
  $line = (int)$line;// Cast para inteiro
  if(leapYear($line)){
    huluculu($line);
    bulukulu($line);// Só é executado caso leap year retorne TRUE
  }else{
    (huluculu($line)?:(print "This is an ordinary year.<br>"));// Operador Ternario verifica se é ano de huluculu caso contrario é um ano ordinário
  }
  echo "<br>";
}
 ?>
