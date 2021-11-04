<?php

use App\HocSinh;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HocSinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(HocSinh::class, 20)->create();
    }
}
