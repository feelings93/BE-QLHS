<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\HocSinh;
use App\Model;
use Faker\Generator as Faker;

$factory->define(HocSinh::class, function (Faker $faker) {
    $gioiTinh = ['Nam', 'Nữ', 'Khác'];
    return [
        'hoTen' => $faker->name(),
        'diaChi' => $faker->address(),
        'ngaySinh' => $faker->date(),
        'gioiTinh' => $gioiTinh[rand(0, 2)],

    ];
});
