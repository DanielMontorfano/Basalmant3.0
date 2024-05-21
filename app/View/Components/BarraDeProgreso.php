<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BarraDeProgreso extends Component
{
    public $percentage;
    public $color;

    public function __construct($percentage, $color)
    {
        $this->percentage = $percentage;
        $this->color = $color;
    }

    public function render()
    {
        return view('components.barra-de-progreso');
    }
}
