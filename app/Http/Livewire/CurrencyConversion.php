<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Services\CurrencyConverter;
use Livewire\Component;

class CurrencyConversion extends Component
{
    public $currencies;
    public $amount;
    public $from = 'USD';
    public $to = 'MYR';
    public $result_value;
    public $from_to_value;
    public $to_from_value;

    public function convert(CurrencyConverter $service)
    {
        $result = $service->convert($this->resolveQuery());
        $this->result_value = $result * $this->amount;
    }

    public function render(Country $country)
    {
        $this->currencies = $country->getCurrency()->get();
        return view('livewire.currency-conversion');
    }

    protected function resolveQuery()
    {
        return strtoupper($this->from).'_'.strtoupper($this->to);
    }
}
