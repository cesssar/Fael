<?php
 function getDataBR($dateSql){
    $ano= substr($dateSql, 0,4);
    $mes= substr($dateSql, 5,2);
    $dia= substr($dateSql, 8,2);
    return $dia.'/'.$mes.'/'.$ano;
}

function getDataMySql($dataBR){
    $ano= substr($dataBR,6,4);
    $mes= substr($dataBR,3,2);
    $dia= substr($dataBR,0,2);
    return $ano.'-'.$mes.'-'.$dia;
}

echo getDataBR('1980-03-20');
echo '<br>';
echo getDataMySql('20/03/1980');

?>