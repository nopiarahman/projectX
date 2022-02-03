<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $nama;
    public $greetings;
    public $pesan;
    public function __construct($nama,$greetings,$pesan)
    {
        $this->nama = $nama;
        $this->greetings = $greetings;
        $this->pesan = $pesan;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar');
    }
}
