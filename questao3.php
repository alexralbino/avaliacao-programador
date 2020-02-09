<?php

function insereOrdenado(&$sorteia,$num,$mod,$inicio){//Insere $num já na posição correta do vetor
  $resto = $num % $mod;
  $chave = 0;
  for($i=$inicio;$i < count($sorteia); $i++){//Loop que percorre o vetor
    $atual = $sorteia[$i] % $mod;
    if(($atual > $resto) ||
    (($atual == $resto) && ($num % 2) == 1 && ($atual % 2) == 0) ||
    (($atual == $resto) && ($num % 2) == 0 && ($atual % 2) == 0 && $num < $sorteia[$i]) ||
    (($atual == $resto) && ($num % 2) == 1 && ($sorteia[$i] % 2) == 1 && $num > $sorteia[$i])){
      array_splice($sorteia,$i,0,$num);
      $chave = 1;
      break;
    }
  }
  if($chave == 0){ //Caso não entre em nenhum dos casos especificados
    array_push($sorteia,$num);// Insere no fim do vetor
  }
}

$file = file("teste3.txt");// Arquivo de entrada
$sorteia = array();
$count = 0; $inicio = 0;

foreach ($file as $line){//Laço para pegar cada linha do arquivo
  $numeros = explode(" ",$line);
  $numeros[0] = (int)$numeros[0];
  if(count($numeros) > 1){ //Caso encontre um vetor com mais de 1 posição (o que indica inicio de um novo conjunto ou fim da leitura)
    $mod = (int)$numeros[1];
    $sorteia[$count] = $numeros[0] . " " . (int)$numeros[1];
    $inicio = $count + 1;
    if($numeros[0] == 0 && $mod == 0){ //Caso encontre dois valores nulos
      break;
    }
  }else{
    if($inicio == $count){
      array_push($sorteia,$numeros[0]); // Adiciona o primeiro número do conjunto sem ter
                                        // que passar pelo vetor
    }else{
      insereOrdenado($sorteia,$numeros[0],$mod,$inicio); //Inserção do número do conjunto no vetor
    }
  }
  $count++;
}

for($i=0;$i < count($sorteia);$i++){ //Display dos valores e vetor $sorteia ordenado
  echo $sorteia[$i] . "<br>";
}

 ?>
