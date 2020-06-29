<?php

include('simple_html_dom.php');

$html = file_get_html('./source.html');

foreach($html->find('.GamesMenu') as $game) {

    $item['BetName'] = $game->find('span.Game__header__name', 0)->plaintext;
    $runners = $game->find('.StandardRunners__bet-button');
    $options = [];

    foreach($runners as $runner) {

        $run['Outcome'] = trim($runner->find('span.BetButton__runnerName', 0)->innertext);
        $run['Odds'] = trim($runner->find('span.BetButton__price', 0)->innertext);
        $options[] = $run;

    }

    $item['BetOptions'] = $options;
    $games[] = $item;

}

echo json_encode($games);
