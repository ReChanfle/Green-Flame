<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Discounts;
use App\Models\DiscountsRanges;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DiscountsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $namerandom = Str::random(10);

            $codeRandom =  Str::random(10);



            $discount = Discounts::create([
                'name' => $namerandom,
                'start_date' =>  "2023-09-15 22:51:51",
                'end_date' =>  "2023-09-30 22:51:51",
                'priority' => rand(1, 999),
                'active' => rand(0, 1),
                'region_id' => rand(1, 4),
                'brand_id' => rand(1, 3),
                'access_type_code' =>  "A"

            ]);

                for($i = 1; $i <= 3; $i++)
                    {
                        DiscountsRanges::create([
                            'from_days' => rand(1, 50),
                            'to_days' => rand(50, 80),
                            'discount' => rand(1,99),
                            'code' => $codeRandom,
                            'discount_id' => $discount->id]
                        );
                    }


    }
}
