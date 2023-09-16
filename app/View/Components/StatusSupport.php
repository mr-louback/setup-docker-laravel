<?php

namespace App\View\Components;

use App\ENUM\SupportStatus;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Helpers\getStatusSupport;

class StatusSupport extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected string $status,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $color = 'green';
        $color = $this->status === 'C' ? 'blue' : $color;
        $color = $this->status === 'P' ? 'red' : $color;
        $textStatus = getStatusSupport($this->status);
        return view('components.status-support', compact('textStatus', 'color'));
    }
}
