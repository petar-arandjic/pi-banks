<?php

use Illuminate\Database\Seeder;

class BankStyleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $styles = [
            [
                "bg_color" => "f44336",
                "font_color" => "000000"
            ],
            [
                "bg_color" => "e91e63",
                "font_color" => "000000"
            ],
            [
                "bg_color" => "8a4af3",
                "font_color" => "fafafa"
            ],
            [
                "bg_color" => "673ab7",
                "font_color" => "fafafa"
            ],
            [
                "bg_color" => "3f51b5",
                "font_color" => "ffffff"
            ],
            [
                "bg_color" => "2196f3",
                "font_color" => "ffffff"
            ],
            [
                "bg_color" => "03a9f4",
                "font_color" => "ffffff"
            ],
            [
                "bg_color" => "009688",
                "font_color" => "ffffff"
            ],
            [
                "bg_color" => "4caf50",
                "font_color" => "ffffff"
            ],
            [
                "bg_color" => "ff9800",
                "font_color" => "000000"
            ],
        ];
        //
        foreach($styles as $style){
            factory(App\BankStyle::class, 1)->create([
                "bg_color" => $style['bg_color'],
                "font_color" => $style['font_color']
            ]);
        }
    }
}
