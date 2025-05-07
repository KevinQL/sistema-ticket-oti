<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equipment;
use App\Models\Office;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offices = Office::all();

        foreach ($offices as $office) {
            // PC para cada oficina
            Equipment::create([
                'type' => 'PC',
                'brand' => 'HP',
                'model' => 'ProDesk 600 G6',
                'serial_number' => 'HP' . $office->id . rand(1000, 9999),
                'status' => 'operational',
                'office_id' => $office->id,
                'specifications' => 'Intel Core i5, 16GB RAM, 512GB SSD',
                'purchase_date' => '2024-01-01',
                'warranty_expiration' => '2027-01-01'
            ]);

            // Impresora para cada oficina
            Equipment::create([
                'type' => 'Impresora',
                'brand' => 'Epson',
                'model' => 'L3150',
                'serial_number' => 'EP' . $office->id . rand(1000, 9999),
                'status' => 'operational',
                'office_id' => $office->id,
                'specifications' => 'Impresora Multifuncional EcoTank',
                'purchase_date' => '2024-01-01',
                'warranty_expiration' => '2026-01-01'
            ]);

            // Laptop adicional para OTI
            if ($office->department === 'OTI') {
                Equipment::create([
                    'type' => 'Laptop',
                    'brand' => 'Lenovo',
                    'model' => 'ThinkPad T14',
                    'serial_number' => 'LN' . $office->id . rand(1000, 9999),
                    'status' => 'operational',
                    'office_id' => $office->id,
                    'specifications' => 'Intel Core i7, 32GB RAM, 1TB SSD',
                    'purchase_date' => '2024-01-01',
                    'warranty_expiration' => '2027-01-01'
                ]);
            }
        }
    }
}
