<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function formatCurrentcy($number)
    {
        return "Rp " . number_format($number, 0, ',', '.');
    }
}
