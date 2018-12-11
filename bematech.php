<?php
/**
 * Classe implementa
 */
class bematech{

    var $fp;
    var $port;

    /******************************************************************************************************
     *  Operation
     * 
     * Comandos de operação 
     * 
     **************************************************************************************************** */

   /**
    * Initializes the printer
    */
    function inicializar(){
        
        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(64));

    }

    //ESC b n 98 62 Enable (1): Status drawer sensor Disable (0): Status paper sensor
    function habilitar(){

    }

    /**
     * ESC v n 118 76 Activate drawer (n miliseconds) -50ms < n < 200ms
     */


    /**
     * Cortar o papel
     * 
     * ESC w 119 77 Performs a paper cut
     */
    function cortarPapel(){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(119));

    }

    
    // ESC x 120 78 Enable Dump Mode
    

    /**
     *  ESC y n 121 79 Enable (1) or Disable (0). Keyboard default (1)
     */
    function ativaTeclado(){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(121));

    }

    /**
     * Linha automatica
     * 
     * ESC z 1/0 122 7A Enable automatic line feed (n=1). Disable automatic line feeed (n=0)
     */
    function autoLineFeed(){

    fwrite($this->fp, chr(27));
    fwrite($this->fp, chr(122));

    }

    /**
     * ESC m 109 6D Performs a parcial paper cut
     */
    function corteParcial(){

    fwrite($this->fp, chr(27));
    fwrite($this->fp, chr(109));

    }

    /** ************************************************************************************************
     * Vertical Positioning
     * 
     * Formatação vertical
     ************************************************************************************************ */
    
    /**
     * ESC C n 67 43 Programs the page size in lines where n is the number of lines 
     * (single height). The standard is 12 lines (of single height).
     * 
     * @param String $n NUmero de linhas
     */
     function tamPagina($n){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(67));
        fwrite($this->fp, chr($n));

     }

    /**
     * 
     * ESC c n1 n2 99 63 
     * 
     * Programs the page size in millimeters where Size=0,125mm*n1*n2. 
     */
    function tamPaginaMm($n1, $n2){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(99));
        fwrite($this->fp, chr($n1));
        fwrite($this->fp, chr($n2));

    }

    /**
     * 
     * ESC J n 74 4A 
     * 
     * Performs the feeding of n*0,125mm of paper.
     * Tracciona 0,125mm de papel
     * 
     * @param Int $n Numero N x 0,125mm
     */
    function tracionaMm($n){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(74));
        fwrite($this->fp, chr($n1));
        
    }
    
    /**
     * FF 12 0C Feeds one page.
     */
    function novaPagina(){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(12));
    }

    /**
     * LF 10 0A 
     * 
     * Feeds one line.
     */
    function novaLinha(){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(10));

    }
    
    /**
     * ESC 2 50 32 Line feed of 1/6” – default line feed
     */
    function novaLinhaBy6(){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(50));

    }

    /**
     * 
     * ESC 3 n 51 33 Line feed of n/144 of an inch, where n goes from 18(d) up to 255(d).
     */
    function novaLInhaBy133($n){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(51));
        fwrite($this->fp, chr(ord($n)));

    }

    /**
     * ESC f 1 n 102 66 Vertical skipping of n characters.
     */
    function espacamentoVertical($n){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(1102));
        fwrite($this->fp, chr(ord($n)));

    }
    
    /**
     * ESC A n 65 41 Performs the feeding of n*0,375mm of paper.
     */
    function traccionar375($n){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(65));
        fwrite($this->fp, chr(ord($n)));

    }

    /**
     * Abrir porta
     * 
     * @param String $porta Porta para conectar impressora
     */
    function abrirPorta($porta){

        $this->port = $porta;
        exec("MODE $this->port BAUD=9600 PARITY=n DATA=8 XON=on STOP=1");
        $this->fp = fopen($this->port, 'c+');   

    }

    /**
     * Fechar porta
     */
    function fecharPorta(){

        fclose($this->fp);
    }


    function conectarTeste(){

    /**
     * para teste foi definido um arquivo de saida
     */
    return $this->fp = fopen("teste.txt", 'c+');

    }

    /**
     * Escreve
     * @param String $string String a ser impressa
     */
    function escreve($string){

        $string=str_split($string);

        for ($i=0; $i < sizeof($string) ; $i++) { 

            fwrite($this->fp, chr(ord($string[$i])));

        }   

    }
    //########################################################################################################
    //  
    //      FORMATAÇÃO DA STRING
    //
    //########################################################################################################

    //----------------------------------------------------------------------------------------------------
    //  NEGRITO
    //----------------------------------------------------------------------------------------------------
    function bold(){

    fwrite($this->fp, chr(27));
    fwrite($this->fp, chr(69));

    }

}

?>

