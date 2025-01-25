<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PermissionCategory;

class PermissionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Category',
            'Products',
            'Suppliers',
            'Purchase',
            'Stock',
            'Expenses',
            'Sales',
            'Users',
            'Roles & Permissions'
        ];

        for ($i = 0; $i < count($data); $i++) {
            PermissionCategory::create([
                'name' => $data[$i]
            ]);
        }
    }
}
