<?php

namespace App\Services;

use App\Models\Country;
use App\Models\CurrencyConverterRate;
use Illuminate\Support\Facades\Http;

class CurrencyConverter
{
    const CALL_LIMIT = 5;

    public function __construct()
    {
        $this->default_url = 'https://free.currconv.com/api/v7/convert';
        $this->default_query = 'USD_MYR';
        $this->default_compact = 'ultra';
        $this->apiKey = config('app.CURRENCY_CONVERTER_API_KEY');
    }

    public function generate_countries()
    {
        $response = Http::get('https://free.currconv.com/api/v7/countries', [
            'apiKey' => $this->apiKey
        ]);

        $collection = $response->json()['results'];

        foreach($collection as $item) {
            Country::firstOrCreate([
                'name' => $item['name'],
                'currency' => $item['currencyId']
            ]);
        }
    }

    public function convert($query=null, $compact=null)
    {
        try {
            $today = date("Y-m-d");

            $currency_rate = CurrencyConverterRate::firstOrCreate([
                'day' => $today,
                'query' => $query
            ], [
                'rates' => 0,
                'limit' => 0
            ]);

            if($currency_rate->limit >= self::CALL_LIMIT)  {
                return $currency_rate->rates;
            }

            $response = Http::get($this->default_url, [
                'apiKey' => $this->apiKey,
                'q' => $this->resolveQuery($query),
                'compact' => $this->resolveCompact($compact)
            ]);

            $result = $response->collect()->first();
            
            $currency_rate->increment('limit');
            $currency_rate->rates = $result;
            $currency_rate->save();

            return $result;
            
        } catch(\Exception $e) {
            return 0;
        }
    }

    protected function resolveQuery($query=null)
    {
        if(is_null($query)) {
            return $this->default_query;
        }

        return $query;
    }

    protected function resolveCompact($compact=null)
    {
        if(is_null($compact)) {
            return $this->default_compact;
        }

        return $compact;
    }
}