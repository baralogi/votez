<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Title extends Component
{
    public $title;
    public $lead;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $lead)
    {
        $this->title = $title;
        $this->lead = $lead;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.title');
    }
}
