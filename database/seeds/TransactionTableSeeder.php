<?php

use Illuminate\Database\Seeder;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $partner_id = [24,25,26,27,28,29,30,31,32,33,34,35,36,37];
        factory(App\Transaction::class, 35)->create([
            'partner_id' => $partner_id[rand(0, 13)]
        ]);
    }
}
