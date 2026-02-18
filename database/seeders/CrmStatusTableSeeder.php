<?php

namespace Database\Seeders;

use App\Models\CrmStatus;
use Illuminate\Database\Seeder;

class CrmStatusTableSeeder extends Seeder
{
    public function run()
    {
        $crmStatuses = [
            [
                'id'         => 1,
                'name'       => 'Lead',
                'created_at' => '2025-01-09 05:45:11',
                'updated_at' => '2025-01-09 05:45:11',
            ],
            [
                'id'         => 2,
                'name'       => 'Customer',
                'created_at' => '2025-01-09 05:45:11',
                'updated_at' => '2025-01-09 05:45:11',
            ],
            [
                'id'         => 3,
                'name'       => 'Partner',
                'created_at' => '2025-01-09 05:45:11',
                'updated_at' => '2025-01-09 05:45:11',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
