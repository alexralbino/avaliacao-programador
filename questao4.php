<?php
function contaParenteses($frase){//Função para definir se está correta ou não a utilização de parenteses
  $numParenteses = 0;
  for($i=0;$i < strlen($frase);$i++){//Laço para passar por toda a frase
    if($frase[$i] == "("){//Incrementa quando encontra um (
      $numParenteses++;
    }else{
      if($frase[$i] == ")"){//Decrementa quando encontra um )
        $numParenteses--;
        if($numParenteses < 0){//Caso fique negativo ao se decrementar(indica falha diretamente)
          break;
        }
      }
    }
  }
  if($numParenteses > 0 || $numParenteses < 0){ //Output de informação
    echo "Incorrect.<br>";
  }else{
    echo "Correct.<br>";
  }
}

$file = file("teste4.txt");// Arquivo de entrada
$i = 0;
foreach ($file as $line){//Laço para pegar cada linha do arquivo
  contaParenteses($line);
  $i++;
}

 ?>
