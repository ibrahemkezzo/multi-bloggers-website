<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Masthead extends Component
{
    public $subheading;
    public $heading;
    public $link;
    public $linkText;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $subheading = 'Welcome To Our Studio!',
        $heading = "It's Nice To Meet You",
        $link = '#services',
        $linkText = 'Tell Me More'
        )
    {
        $this->subheading = $subheading;
        $this->heading = $heading;
        $this->link = $link;
        $this->linkText = $linkText;    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.masthead');
    }
}
