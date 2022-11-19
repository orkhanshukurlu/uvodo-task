<?php

Route::get('uri', [sdsfController::class, 'fsfsd']);

class Route
{
    private function httpMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}