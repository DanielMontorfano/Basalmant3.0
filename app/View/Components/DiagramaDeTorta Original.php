<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DiagramaDeTorta extends Component
{
    
    public $data;

    
    public function render()
{
    $data = [
        [
            "name" => "Pimienta",
            "y" => 30
        ],
        [
            "name" => "SAl",
            "y" => 30
        ],
        [
            "name" => "Cebolla",
            "y" => 20
        ],
        [
            "name" => "Dani",
            "y" => 20
        ]

    ];

    $data = json_encode($data);

    return view('components.diagrama-de-torta', compact('data'));
}


}
