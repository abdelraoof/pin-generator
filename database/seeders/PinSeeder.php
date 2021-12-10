<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($digit1 = 0; $digit1 < 10; $digit1++) {
            for ($digit2 = 0; $digit2 < 10; $digit2++) {
                for ($digit3 = 0; $digit3 < 10; $digit3++) {
                    for ($digit4 = 0; $digit4 < 10; $digit4++) {
                        // exclude obvious combinations
                        $valid = true;
                        $diff1 = abs($digit1 - $digit2);
                        $diff2 = abs($digit2 - $digit3);
                        $diff3 = abs($digit3 - $digit4);
                        $uniqueDigits = count(array_unique([$digit1, $digit2, $digit3, $digit4]));
                        if (($diff1 == $diff2 && $diff2 == $diff3) || $uniqueDigits < 3) {
                            $valid = false;
                        }
                        $pin = $digit1 . $digit2 . $digit3 . $digit4;
                        DB::table('pins')->insert([
                            'pin' => $pin,
                            'valid' => $valid,
                        ]);
                    }
                }
            }
        }
    }
}
