<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Khóa Học',
            'slug' => 'khoa-hoc',
            'parent_id' => null,
            'created_by' => 'System',
            'updated_by' => 'System',
            'delete_flag' => false,
        ]);
        Category::create([
            'name' => 'Web Development',
            'slug' => 'web-development',
            'parent_id' => 1,
            'created_by' => 'System',
            'updated_by' => 'System',
            'delete_flag' => false,
        ]);
        Category::create([
            'name' => 'Mobile Development',
            'slug' => 'mobile-development',
            'parent_id' => 1,
            'created_by' => 'System',
            'updated_by' => 'System',
            'delete_flag' => false,
        ]);
    }
}
