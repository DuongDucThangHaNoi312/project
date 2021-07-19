<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Máy Tính & Laptop'
        ]);
        Category::create([
            'name' => 'Váy'
        ]);
        Category::create([
            'name' => 'Phụ kiện điện thoại'
        ]);
        Category::create([
            'name' => 'Mĩ phẩm'
        ]);
        Category::create([
            'name' => 'Thiết bị nhà bếp'
        ]);
        Category::create([
            'name' => 'Thể thao dã ngoại'
        ]);
        Category::create([
            'name' => 'Handmade'
        ]);
        Category::create([
            'name' => 'Sức khỏe'
        ]);
        Category::create([
            'name' => 'Oto'
        ]);
        Category::create([
            'name' => 'Xe máy'
        ]);


    }
}
