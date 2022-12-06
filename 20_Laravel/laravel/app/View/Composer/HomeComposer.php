<?php

namespace App\View\Composer;

use Illuminate\View\View;

class HomeComposer
{
    protected $data;

    public function __construct()
    {
        $this->data = 'Well';
    }

    public function compose(View $view)
    {
        $view->with('data', $this->data);
    }
}
