<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Tabla extends Component
{
    public $name; 
    public $active;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$active)
    {
        //
        $this->name=$name;
        $this->active=$active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tabla');
    }
}
