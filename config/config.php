<?php
#caminhos absolutos
$pastaInterna="";
define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}");
(substr($_SERVER['DOCUMENT_ROOT'],-1)=='/')?$barra="":$barra="/";
define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$barra}{$pastaInterna}");

#atalhos
define('DIRIMG',DIRPAGE."img/");
define('DIRCSS',DIRPAGE."lib/css/");
define('DIRJS',DIRPAGE."lib/js/");
define('DIRLIB',DIRPAGE."lib/");

?>