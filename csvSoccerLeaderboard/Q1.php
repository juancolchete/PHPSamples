<?php
function divideGrupos($filename, $indexGroup)
{
    $tabelaGrupos = array();
    if (($handle = fopen("$filename", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
            $teamData = array();
            if (!isset($tabelaGrupos[$data[$indexGroup]])) {
                $tabelaGrupos[$data[$indexGroup]] = array();
            }
            for ($i = 0; $i < count($data); $i++) {
                if ($i != $indexGroup) {
                    array_push($teamData, $data[$i]);
                }
            }
            array_push($tabelaGrupos[$data[$indexGroup]], $teamData);
        }
    }
    return $tabelaGrupos;
}
$tabelaGrupos = divideGrupos('leaderboard_soccer.csv', 4);
// Para validar os valores $tabelaGrupos retire o comentário das linhas abaixo
// print "<pre>";
// print_r($tabelaGrupos);
// print "</pre>";
