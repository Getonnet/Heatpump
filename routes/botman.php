<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply("Hello! My name is Babu. How Can I help you? Please write 'start' for going main step.");
});

$botman->hears('Kuddus', function ($bot) {
    $bot->reply('Hi nazmul!');
});


$botman->fallback(function($bot) {
    $bot->reply("Please write 'hi' for conversation ...");
});

$botman->hears('start', BotManController::class.'@startConversation');
