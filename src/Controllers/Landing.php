<?php
namespace Controllers;

use Libs\View;
use Libs\Neuron;

class Landing {
    public static function home(): void {
        View::render('home');
    }

    public static function about(): void {
        View::render('about');
    }

    public static function contact(): void {
        View::render('contact');
    }

    public static function distributions(): void {
        View::render('distributions');
    }

    public static function news(): void {
        View::render('news');
    }
}
