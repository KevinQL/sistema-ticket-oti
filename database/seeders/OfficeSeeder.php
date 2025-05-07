<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Office;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offices = [
            [
                'name' => 'Oficina de Tecnologías de Información',
                'location' => 'Primer Piso',
                'department' => 'OTI',
                'description' => 'Oficina principal de TI',
                'active' => true
            ],
            [
                'name' => 'Recursos Humanos',
                'location' => 'Segundo Piso',
                'department' => 'RRHH',
                'description' => 'Oficina de gestión de personal',
                'active' => true
            ],
            [
                'name' => 'Contabilidad',
                'location' => 'Tercer Piso',
                'department' => 'Finanzas',
                'description' => 'Oficina de gestión contable',
                'active' => true
            ],
            [
                'name' => 'Logística',
                'location' => 'Primer Piso',
                'department' => 'Administración',
                'description' => 'Oficina de gestión logística',
                'active' => true
            ]
        ];

        foreach ($offices as $office) {
            Office::create($office);
        }
    }
}
