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
                'created_at' => '2021-04-16 10:22:08',
                'updated_at' => '2021-04-16 10:22:08',
            ],
            [
                'id'         => 2,
                'name'       => 'Customer',
                'created_at' => '2021-04-16 10:22:08',
                'updated_at' => '2021-04-16 10:22:08',
            ],
            [
                'id'         => 3,
                'name'       => 'Partner',
                'created_at' => '2021-04-16 10:22:08',
                'updated_at' => '2021-04-16 10:22:08',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
