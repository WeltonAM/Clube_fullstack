<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Presents the type of the message.
     *
     * @var string
     */
    public $key;

    /**
     * The message content.
     *
     * @var string
     */
    public $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($key, $message)
    {
        $this->key = $key;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
