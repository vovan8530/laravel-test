<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Footer extends Component
{
    public function render(): string
    {
        return $this->view('components.footer', ['footer' => 123]);
    }
}
