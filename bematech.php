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
        //fwrite($this->fp, chr(27));
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
        fwrite($this->fp, chr(102));
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

    /** ************************************************************************************************
     * Horizontal Positioning
     * 
     * Formatação horizontal
     ************************************************************************************************ */

     /**
      * ESC f 0 n 102 66 Horizontal skipping of n characters.
      * NÃO IMPLEMENTADO
      */
    function espacamentoHorizontal($n){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(65));
        fwrite($this->fp, chr(ord($n)));

    }

      /**
       * ESC Q n 81 51 Program right margin to column n
       * 
       */
    function margemEsquerda($n){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(81));
        fwrite($this->fp, chr(ord($n)));

    }

      /**
       * ESC I n 108 6c Program left margin to column n
       */
    function margemDireita($n){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(108));
        fwrite($this->fp, chr(ord($n)));

    }

    /**
     * ESC a n 97 61 Aligning the characters. Centering if n=1 or left end alignment if
     * n=0.
     * 1 centralizado
     * 0 direita
     */
    function alinhamento($n){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(97));
        fwrite($this->fp, chr(ord($n)));

    }

    /** ************************************************************************************************
     * Character Types
     * 
     * Formatação dos caracteres
     ************************************************************************************************ */

    /**
     * ESC - n 45 2D Underlined mode on (n=1) or off (n=0).
     * 
     * Modo sublinhado
     *  on (n=1) 
     *  off (n=0)
     */
    function underline($n){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(45));
        fwrite($this->fp, chr(ord($n)));
    }

    /**
     * ESC 4 52 34 Italic mode on.
     * 
     * Ativa o modo italico
     */
    function italicoOn(){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(52));

    }

    /**
     * ESC 5 53 35 Italic mode off.
     * 
     * desativa o modo italico
     */
    function italicoOff(){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(53));

    }

    /**
     * ESC E 69 45 Emphasized mode on.
     * 
     * Habilita o modo negrito
     */
    function negritoOn(){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(69));

    }

    /**
     * ESC F 70 46 Emphasized mode off
     * 
     * desabilita o modo negrito
     */
    function negritoOff(){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(70));

    }

    /**
     * ESC t n 116 74 Selects code page:
     * 
     *   n=2 (CODEPAGE 850 - Default)
     *  n=3 (CODEPAGE 437)
     *  n=4 (CODEPAGE 860)
     *  n=5 (CODEPAGE 858)
     */
    function codePage($n){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(116));
        fwrite($this->fp, chr(ord($n)));

    }

    /**
     * ESC S n 83 53 n=0 (enable superscript characters)
     * n=1 (enable subscript characters)
     */

    /**
     * ESC T 84 54 Disable superscript and subscript modes
    */

    /**
     * ESC N n 78 4E n=0 (density very weak) 
     * n=1 (density weak)
     * n=2 (density normal) n=3 (density strong)
     * n=4 (density very strong)
     */
    function densidade($n){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(78));
        fwrite($this->fp, chr(ord($n)));

    }

    /**
    * ESC } n 125 7D n=1 (inverted mode enable)
    * n=0 (inverted mode disable)
    */
    function impressãoInvertida($n){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(125));
        fwrite($this->fp, chr(ord($n)));

    }

    /** ************************************************************************************************
     * Print Width, Character Width And Height
     * 
     * 
     ************************************************************************************************ */

    /**
     * DC2 18 12 Condensed mode (42 columns) off.
    */

    /**
     * DC4 20 14 One-line expanded mode off.
     */

    /**
    * ESC d n 100 64 Double height on (n=1) or off (n=0).
    */
    function  doubleHeight($n){

        fwrite($this->fp, chr(27));
        fwrite($this->fp, chr(100));
        fwrite($this->fp, chr(ord($n)));

    }

    /**
     * ESC H 72 48 48-column mode on (default).
     */

    /**
     * ESC P 80 50 48-column mode on (default).
    */

    /**
     * ESC SI 15 0F Condensed mode (64 columns) on.
     */
    function colunas($n){

        if ($n == "48") {
            $this->inicializar();
            fwrite($this->fp, chr(27));
            fwrite($this->fp, chr(72));
            fwrite($this->fp, chr(ord($n)));
        }else{

            $this->inicializar();
            fwrite($this->fp, chr(27));
            fwrite($this->fp, chr(15));
            fwrite($this->fp, chr(ord($n)));
        }
        
    }

    

    /**
    * ESC SO 14 0E One-line expanded mode on.
    */

    /**
     * ESC V 86 56 One-line double height on.
     */

    /**
     * ESC W n 87 57 Expanded mode on (n=1) or off (n=0).
    */

    /**
     * SI 15 0F Condensed mode (64 columns) on.
     */

    /**
    * SO 14 0E One-line expanded mode on.
    */

    //---------------------------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------------------------
    
    
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
     * 
     * Fecha a porta de comunicação
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
     * 
     * Envia o texto para a impressora
     * 
     * @param String $string Texto a ser impresso
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

