<?php
require('Q1.php');
$tabelaGrupos = divideGrupos('leaderboard_soccer.csv', 4);
function verificaTimes($tabelaGrupos, $indexTeamOne, $indexTeamTwo)
{
    $teamCounter = array();
    $groups = array_keys($tabelaGrupos);
    $matchesCounter = 0;
    for ($i = 0; $i < count($tabelaGrupos); $i++) {
        $groupMatches = $tabelaGrupos[$groups[$i]];
        for ($m = 0; $m < count($groupMatches); $m++) {
            $teamOne = $tabelaGrupos[$groups[$i]][$m][$indexTeamOne];
            $teamTwo = $tabelaGrupos[$groups[$i]][$m][$indexTeamTwo];
            if (!isset($teamCounter[$teamOne])) {
                $teamCounter[$teamOne] = 0;
            }
            if (!isset($teamCounter[$teamTwo])) {
                $teamCounter[$teamTwo] = 0;
            }
            $teamCounter[$teamOne]++;
            $teamCounter[$teamTwo]++;
        }
    }
    if($matchesCounter == 0){
        $matchesCounter = $teamCounter[$teamOne];
    }
    $isValid = false;
    $teams = array_keys($teamCounter);
    for($i=0;$i < count($teamCounter);$i++){
        if($teamCounter[$teams[$i]] == $matchesCounter){
            $isValid = true;
        }else{
            $isValid = false;
            break;
        }
    }
    return $isValid;
}
$resultadoBooleano = verificaTimes($tabelaGrupos, 0, 2);
// Para validar o valore $resultadoBooleano retire o comentário da linha abaixo
//var_dump($resultadoBooleano);
