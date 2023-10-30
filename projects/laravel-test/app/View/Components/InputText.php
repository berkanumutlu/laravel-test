<?php
/**
 * php artisan make:component InputText
 * php artisan make:component InputText --view ===> Sadece componentin view dosyasını oluşturur.
 */
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputText extends Component
{
    public const TYPES = ['text', 'checkbox', 'submit'];

    /**
     * Create a new component instance.
     */
    public function __construct(public ?string $type = null, public ?string $name = null, public ?string $class = null, public ?string $id = null, public ?string $label = null, public ?string $placeholder = null)
    {
        /*
         * PHP 8 öncesi için bu şekilde set edilmesi gerekiyor. PHP 8 ile parametreyi public yapmak yeterli oluyor.
         */
        //$this->>type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (in_array($this->type, self::TYPES))
        {
            return view('components.input-text');
        }
        //dump($this->type);
        //return '<p>berkan</p>';
        return "";
    }
}
