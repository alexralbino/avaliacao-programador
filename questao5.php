<?php
function dateDifference($date_1 , $date_2 , $differenceFormat = '%d %m %y'){// Retorna número de dias/meses/anos entre duas datas
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);

    $interval = date_diff($datetime1, $datetime2);

    return $interval->format($differenceFormat);

}

$file = file("teste5.txt");// Arquivo de entrada
$anterior;$atual = array();$output = array();$i = 0;$max=0; //Inicializações de variaveis

foreach ($file as $line){//Laço para pegar cada linha do arquivo
  $numeros = explode(" ",$line);
  if($max != 0){ // Se tem um bloco a ser lido
    $atual[0] = $numeros[2] . "-" . $numeros[1] . "-" . $numeros[0]; //0 = Data
    $atual[1] = (int)$numeros[3];                                    //1 = Consumo
    if($anterior == null && $max > 0){ //Primeira linha de um bloco
      $anterior = $atual;
    }else{
      $dias = dateDifference($anterior[0],$atual[0]);
      $numeros = explode(" ",$dias);
      if((int)$numeros[0] == 1 && (int)$numeros[1] == 0 && (int)$numeros[2] == 0){//Verifica dias que podem ser contabilizados
        $output[0]++;
        $output[1] = $output[1] + ($atual[1] - $anterior[1]);
      }
      $anterior = $atual;
    }
    $max--;
    if($max == 0){
      echo $output[0] . " " . $output[1] . "<br>";// Impressão de dados
    }
  }else{
    if($numeros[0] != 0){ //Primeiro número que define um bloco
      $max = (int)$numeros[0];
      $anterior = null;
      $output[0] = 0;
      $output[1] = 0;
    }else{// Caso encontre 0 (que delimita fim de leitura)
      break;
    }
  }
}

 ?>
