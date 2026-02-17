<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Directorate;
use App\Models\Employee;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SystemRegistrySeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Directorates
        $directorates = [
            'Environmental Biotechnology',
            'Agricultural Biotechnology',
            'Health Biotechnology',
            'Industrial Biotechnology',
            'Bio-Informatics & Emerging Tech',
        ];

        foreach ($directorates as $name) {
            Directorate::firstOrCreate(['name' => $name]);
        }

        $envDir = Directorate::where('name', 'Environmental Biotechnology')->first();
        $agriDir = Directorate::where('name', 'Agricultural Biotechnology')->first();

        // 2. Create Core Users
        $admin = User::firstOrCreate(
            ['email' => 'admin@betin.gov.et'],
            [
                'name' => 'System Administrator',
                'password' => Hash::make('password'),
                'role' => UserRole::ADMIN,
            ]
        );

        $director = User::firstOrCreate(
            ['email' => 'director@betin.gov.et'],
            [
                'name' => 'Dr. Abebe Kebede',
                'password' => Hash::make('password'),
                'role' => UserRole::DIRECTOR,
            ]
        );

        // 3. Create Employees (Investigators)
        $pi1 = Employee::firstOrCreate(
            ['email' => 'mesfin.t@betin.gov.et'],
            [
                'full_name' => 'Mesfin Tadesse',
                'directorate_id' => $envDir->id,
                'institutional_id' => 'BETIN-ENV-001',
                'position' => 'Senior Researcher',
                'system_role' => 'staff',
            ]
        );

        $pi2 = Employee::firstOrCreate(
            ['email' => 'selam.a@betin.gov.et'],
            [
                'full_name' => 'Selamawit Alene',
                'directorate_id' => $agriDir->id,
                'institutional_id' => 'BETIN-AGR-005',
                'position' => 'Lead Scientist',
                'system_role' => 'staff',
            ]
        );

        // 4. Create Sample Projects
        Project::firstOrCreate(
            ['project_code' => 'RES-2024-001'],
            [
                'research_title' => 'Phytoremediation of Industrial Effluents in Modjo River',
                'pi_id' => $pi1->id,
                'directorate_id' => $envDir->id,
                'start_year' => 2024,
                'end_year' => 2026,
                'status' => 'ONGOING',
            ]
        );

        Project::firstOrCreate(
            ['project_code' => 'RES-2024-002'],
            [
                'research_title' => 'Genomic Characterization of Highland Pulse Varieties',
                'pi_id' => $pi2->id,
                'directorate_id' => $agriDir->id,
                'start_year' => 2024,
                'end_year' => 2025,
                'status' => 'REGISTERED',
            ]
        );

        Project::firstOrCreate(
            ['project_code' => 'RES-2023-098'],
            [
                'research_title' => 'Optimization of Bio-Ethanol Production from Sugary Waste',
                'pi_id' => $pi1->id,
                'directorate_id' => $envDir->id,
                'start_year' => 2023,
                'end_year' => 2024,
                'status' => 'COMPLETED',
            ]
        );
    }
}
