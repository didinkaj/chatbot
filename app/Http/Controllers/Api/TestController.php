<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use BotMan\BotMan\BotMan;

class TestController extends Controller
{
    
    public function index()
    {
        $botman = resolve('botman');
        
        $botman->hears('hello', function (BotMan $bot) {
            $bot->reply('Hello yourself.');
        });
        
        $botman->hears('hi', function (BotMan $bot) {
            $bot->reply('how\'re you good to see you.');
        });
    
        $botman->fallback(function($bot) {
            $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...
            hi, bye and hello');
        });
    
        $botman->hears('.*good.*', function ($bot) {
            $bot->reply('Nice to meet you!, am amber');
        });
        
        $botman->hears('hello2', function (BotMan $bot) {
            $bot->reply('Hello yourself.');
        });
        
        $botman->hears('bye', function (BotMan $bot) {
            $bot->reply('Thank you, bye.');
        });

        $botman->listen();
    }
}
