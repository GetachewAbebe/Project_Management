<?php

namespace App\Imports;

use App\Models\Employee;
use App\Models\Directorate;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class StaffImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Skip empty rows
        if (!isset($row['full_name']) || empty($row['full_name'])) {
            return null;
        }

        // 1. Resolve or Create Directorate
        $directorateName = $row['directorate'] ?? 'General Administration';
        $directorate = Directorate::firstOrCreate(['name' => trim($directorateName)]);

        // 2. Map System Role (lowercase and validate)
        $role = strtolower($row['system_role'] ?? 'employee');
        if (!in_array($role, ['employee', 'director', 'evaluator'])) {
            $role = 'employee';
        }

        // 3. Create or Update Employee record
        return Employee::updateOrCreate(
            ['full_name' => trim($row['full_name']), 'institutional_id' => $row['institutional_id'] ?? null],
            [
                'email'            => isset($row['email']) ? trim($row['email']) : null,
                'directorate_id'   => $directorate->id,
                'position'         => $row['position'] ?? 'Staff',
                'system_role'      => $role,
            ]
        );
    }
}
