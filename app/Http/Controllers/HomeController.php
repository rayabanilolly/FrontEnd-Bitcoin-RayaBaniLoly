<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $currencies = $this->getInfo();

        return view('pages.home', [
            'currencies' => Arr::only($currencies, ['USD', 'AUD', 'JPY', 'GBP', 'EUR'])
        ]);
    }

    public function getInfo()
    {
        $res = Http::timeout(env('API_TIMEOUT'))
                ->get(env('API_URI').'/ticker')
                ->getBody();

        return json_decode((string) $res, true);
    }

    public function convert()
    {
        return view('pages.convert');
    }

    public function converting(Request $request)
    {
        return $request->currency == 'btc'
            ? $this->idrToBtc($request->value)
            : $this->btcToIdr($request->value);
    }

    public function idrToBtc($value)
    {
        $converted_value = $value / env('RUPIAH_RATE');

        return Http::timeout(4)
            ->get(env('API_URI').'/tobtc?currency=USD&value='.$converted_value);
    }

    public function btcToIdr($value)
    {
        $data = Arr::only($this->getInfo(), ['USD']);
        $usd_buy = $data['USD']['buy'];

        return number_format($value * ($usd_buy * env('RUPIAH_RATE')));
    }
}
