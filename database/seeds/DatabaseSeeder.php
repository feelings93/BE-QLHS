<?php

use App\ChuongTrinhHoc;
use App\HocKy;
use App\LoaiHinhKiemTra;
use App\MonHoc;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // factory(User::class, 10)->create();
        // $this->call(HocSinhSeeder::class);
        MonHoc::create(['tenMH' => 'Toán']);
        MonHoc::create(['tenMH' => 'Ngữ Văn']);
        MonHoc::create(['tenMH' => 'Sinh Học']);
        MonHoc::create(['tenMH' => 'Vật Lý']);
        MonHoc::create(['tenMH' => 'Hóa Học']);
        MonHoc::create(['tenMH' => 'Lịch Sử']);
        MonHoc::create(['tenMH' => 'Địa Lý']);
        MonHoc::create(['tenMH' => 'Tiếng Anh']);
        MonHoc::create(['tenMH' => 'Giáo Dục Công Dân']);
        MonHoc::create(['tenMH' => 'Giáo Dục QPAN']);
        MonHoc::create(['tenMH' => 'Thể Dục']);
        MonHoc::create(['tenMH' => 'Công Nghệ']);
        MonHoc::create(['tenMH' => 'Tin học']);

        HocKy::create(['tenHK' => 'Học Kỳ 1', 'namHoc' => 2020]);
        HocKy::create(['tenHK' => 'Học Kỳ 2', 'namHoc' => 2020]);
        HocKy::create(['tenHK' => 'Học Kỳ 1', 'namHoc' => 2021]);
        HocKy::create(['tenHK' => 'Học Kỳ 2', 'namHoc' => 2021]);

        LoaiHinhKiemTra::create(['tenLHKT' => '15 phút', 'heSoDiem' => 1, 'thoiGianKiemTra' => 15]);
        LoaiHinhKiemTra::create(['tenLHKT' => '1 tiết', 'heSoDiem' => 2, 'thoiGianKiemTra' => 45]);
        LoaiHinhKiemTra::create(['tenLHKT' => 'Học kỳ', 'heSoDiem' => 3, 'thoiGianKiemTra' => 90]);

        ChuongTrinhHoc::create(['maKhoi' => 1, 'maMH' => 1, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 1, 'maMH' => 2, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 1, 'maMH' => 3, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 1, 'maMH' => 4, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 1, 'maMH' => 5, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 1, 'maMH' => 6, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 1, 'maMH' => 7, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 1, 'maMH' => 8, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 1, 'maMH' => 9, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 1, 'maMH' => 10, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 1, 'maMH' => 11, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 1, 'maMH' => 12, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 1, 'maMH' => 13, 'heSo' => 1]);

        ChuongTrinhHoc::create(['maKhoi' => 2, 'maMH' => 1, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 2, 'maMH' => 2, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 2, 'maMH' => 3, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 2, 'maMH' => 4, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 2, 'maMH' => 5, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 2, 'maMH' => 6, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 2, 'maMH' => 7, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 2, 'maMH' => 8, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 2, 'maMH' => 9, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 2, 'maMH' => 10, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 2, 'maMH' => 11, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 2, 'maMH' => 12, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 2, 'maMH' => 13, 'heSo' => 1]);

        ChuongTrinhHoc::create(['maKhoi' => 3, 'maMH' => 1, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 3, 'maMH' => 2, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 3, 'maMH' => 3, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 3, 'maMH' => 4, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 3, 'maMH' => 5, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 3, 'maMH' => 6, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 3, 'maMH' => 7, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 3, 'maMH' => 8, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 3, 'maMH' => 9, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 3, 'maMH' => 10, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 3, 'maMH' => 11, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 3, 'maMH' => 12, 'heSo' => 1]);
        ChuongTrinhHoc::create(['maKhoi' => 3, 'maMH' => 13, 'heSo' => 1]);


    }
}
