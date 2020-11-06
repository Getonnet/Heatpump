<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});

$botman->hears('Kuddus', function ($bot) {
    $bot->reply('Hi nazmul!');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');
