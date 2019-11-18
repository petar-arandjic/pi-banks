<?php

use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            "BAM",
            "EUR",
            "CAD",
            "HKD",
            "ISK",
            "PHP",
            "DKK",
            "HUF",
            "CZK",
            "AUD",
            "RON",
            "SEK",
            "IDR",
            "INR",
            "BRL",
            "RUB",
            "HRK",
            "JPY",
            "THB",
            "CHF",
            "SGD",
            "PLN",
            "BGN",
            "TRY",
            "CNY",
            "NOK",
            "NZD",
            "ZAR",
            "USD",
            "MXN",
            "ILS",
            "GBP",
            "KRW",
            "MYR"
        ];
        foreach( $currencies as $currency){
            factory(App\Currency::class, 1)->create([
                "currency"      =>      $currency,
                "name"          =>      $currency
            ]);
        }
    }
}
