<?php
require('Q2.php');
function computaMelhoresColocados($tabelaGrupos,$indexTeamOne, $indexTeamTwo){
    $resultadoBooleano = verificaTimes($tabelaGrupos, 0, 2);
    if(!$resultadoBooleano){
        return array();
    }
    $groups = array_keys($tabelaGrupos);
    $matchesCounter = 0;
    $classificationRow = array();
    $classificationTable = array();
    for ($i = 0; $i < count($tabelaGrupos); $i++) {
        $groupMatches = $tabelaGrupos[$groups[$i]];
        for ($m = 0; $m < count($groupMatches); $m++) {
            $teamOne = $tabelaGrupos[$groups[$i]][$m][$indexTeamOne];
            $teamTwo = $tabelaGrupos[$groups[$i]][$m][$indexTeamTwo];
            $teamOneGoals = $tabelaGrupos[$groups[$i]][$m][$indexTeamOne+1];
            $teamTwoGoals = $tabelaGrupos[$groups[$i]][$m][$indexTeamTwo+1];
            if(!isset($classificationRow[$teamOne])){
                $classificationRow[$teamOne] = 0;
            }
            if(!isset($classificationRow[$teamTwo])){
                $classificationRow[$teamTwo] = 0;
            }
            if($teamOneGoals > $teamTwoGoals){
                $classificationRow[$teamOne]+=3;
            }else if($teamOneGoals < $teamTwoGoals){
                $classificationRow[$teamTwo]+=3;
            }else{
                $classificationRow[$teamOne]++;
                $classificationRow[$teamTwo]++;
            }
        } 
        arsort($classificationRow);
        $classificationTable[$groups[$i]] = $classificationRow;
        $classificationRow = array();
    }
    return $classificationTable;
}
$tabelaGrupos = divideGrupos('campeonato_futebol.csv', 4);
$tabelaGruposOrdenados = computaMelhoresColocados($tabelaGrupos, 0, 2);
// Para validar os valores $tabelaGruposOrdenados retire os comentários das linhas abaixo
print "<pre>";
print_r($tabelaGruposOrdenados);
print "</pre>";