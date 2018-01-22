<?php

/*              CONSTANTES DO BANCO DE DADOS            */

define('DB_NAME','banco');      //NOME DO BANCO
define('DB_USER','root');       //USUARIO
define('DB_PASSWORD','');       //SENHA
define('DB_HOST','localhost');  //HOST

/*      CAMINHO ABSOLUTO PARA A PASTA DO SISTEMA        */
if(!defined('ABSPATH')){
    define('ABSPATH',dirname(__FILE__).'/');
}

/*      CAMINHO NO SERVIDOR PARA A PASTA DO SISTEMA     */
if(!defined('BASEURL')){
    define('BASEURL','crud/');
}

/*      CAMINHO DO ARQUIVO DE BANCO DE DADOS            */
if(!defined('DBAPI')){
    define('DBAPI',ABSPATH.'inc/database.php');
}

/*              DEFININDO HEADER E FOOTER              */
define('HEADER_TEMPLATE', ABSPATH.'inc/header.php');
define('FOOTER_TEMPLATE', ABSPATH.'inc/footer.php');

/*              DEFININDO ÍCONES GERAIS                 */
define('ICON_LOGIN', 'fa fa-sign-in-alt');
define('ICON_LOGOFF', 'fa fa-sign-out-alt');
define('ICON_LOGO', 'fa fa-clone');

/*INFORMAÇÕES IMPORTANTES:

• '__FILE__' é uma constante que puxa o caminho completo e nome do arquivo com links simbólicos resolvidos

• 'database.sql' é o arquivo que contém as funções gerais de SQL

*/