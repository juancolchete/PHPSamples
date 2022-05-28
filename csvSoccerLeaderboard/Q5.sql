SELECT id,MAX(vitorias*3+empates),
(IFNULL((SELECT SUM(primeiroTimeGols) FROM partidas WHERE primeiroTime = t.id),0)
 +IFNULL((SELECT SUM(segundoTimeGols) FROM partidas WHERE segundoTime = t.id),0)
 -IFNULL((SELECT SUM(segundoTimeGols) FROM partidas WHERE primeiroTime = t.id),0)
 -IFNULL((SELECT SUM(primeiroTimeGols) FROM partidas WHERE segundoTime = t.id),0))
 FROM times t GROUP BY grupo;