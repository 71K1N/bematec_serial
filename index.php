<?php
include 'bematech.php';
$impressora = new bematech();

$impressora->conectarTeste();
$impressora->escreve("----------------------------------------");
$impressora->novaLinha();
$impressora->novaLinha();
$impressora->escreve("segundo teste hh");
$impressora->novaLinha();
$impressora->bold();
$impressora->escreve("----------------------------------------");
$impressora->fecharPorta();


/*
//carrega o componente pelo GUID (pelo nome não funcionou)
$bema = new COM("{310DBDAC-85FF-4008-82A8-E22A09F9460B}");

//abre porta
$init = $bema->IniciaPorta("COM1");

//verifica erro
if ($init <= 0) {
echo "erro!";
exit;
}

//imprime texto com formatação em cada linha
//o espaçamento deve ser ajustado a depender da impressora

//code...
$bema->FormataTX("--------------------------------- \n", 2, 0 , 0, 0, 0);
$bema->FormataTX("Bar do Robson \n", 3, 1 , 0, 1, 0); 
$bema->FormataTX(" Sistema de Bar e Restaurante \n", 2, 0 , 0, 0, 0);

/*
$bema->FormataTX("--------------------------------- \n", 2, 0 , 0, 0, 0);
$bema->FormataTX("Mesa: 35 \n", 2, 0 , 0, 0, 0);
$bema->FormataTX("--------------------------------- \n", 2, 0 , 0, 0, 0);
$bema->FormataTX("05 - Cerveja Skol2,00 10,00 \n", 2, 0 , 0, 0, 0);
$bema->FormataTX("01 - Picanha 15,00 15,00 \n", 2, 0 , 0, 0, 0);
$bema->FormataTX("02 - Batata Frita 4,008,00 \n", 2, 0 , 0, 0, 0);
$bema->FormataTX(" ------ \n", 2, 0 , 0, 0, 0);
$bema->FormataTX(" Total 33,00 \n", 2, 0 , 0, 0, 0);
$bema->FormataTX("--------------------------------- \n", 2, 0 , 0, 0, 0);
$bema->FormataTX("BarRestaurante v1.0 01/05/2007 \n", 1, 0 , 1, 0, 0);
$bema->FormataTX("--------------------------------- \n", 2, 0 , 0, 0, 0);


//fecha a porta de impressao
$bema->FechaPorta();
*/
?>