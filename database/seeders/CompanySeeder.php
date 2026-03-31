<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Company::firstOrCreate([
         'name' => "Zysk",
         'nit' => "1234567890",
         "address" => "street123",
         "logo" => null,
         "phone" => "987654321",
         "email" => "Zysk@gmail.com"
       ]);
    }
}
