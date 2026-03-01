<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReviewRegistrationExport implements FromCollection, WithColumnWidths, WithHeadings, WithStyles, WithTitle
{
    protected Collection $registrations;

    public function __construct(Collection $registrations)
    {
        $this->registrations = $registrations;
    }

    /**
     * Sheet title (tab name in Excel).
     */
    public function title(): string
    {
        return '8th Research Review 2026';
    }

    /**
     * Build the data rows.
     */
    public function collection(): Collection
    {
        return $this->registrations->map(function ($reg) {
            // Build extra projects summary string
            $extraProjects = '';
            if (! empty($reg->extra_projects) && is_array($reg->extra_projects)) {
                $extraProjects = collect($reg->extra_projects)
                    ->map(fn ($p) => ($p['title'] ?? '').' ['.($p['status'] ?? '').']')
                    ->implode('; ');
            }

            return [
                $reg->reference_code,
                $reg->full_name,
                $reg->gender,
                $reg->email,
                $reg->phone,
                $reg->city,
                $reg->organization,
                $reg->job_title,
                $reg->department,
                $reg->qualification,
                $reg->expertise ?? $reg->specialization ?? '',
                $reg->thematic_area,
                $reg->presentation_title,
                $reg->project_status,
                $reg->available_on_date,
                $reg->travel_option,
                $reg->needs_hotel,
                $reg->discovery_source,
                $reg->inviter_name ?? '',
                $reg->previous_attendance,
                $reg->abstract_text ? mb_substr($reg->abstract_text, 0, 500) : '',
                ! empty($reg->extra_projects) ? count($reg->extra_projects) : 0,
                $extraProjects,
                ucfirst($reg->status),
                $reg->created_at ? $reg->created_at->format('Y-m-d H:i') : '',
            ];
        });
    }

    /**
     * Column header row.
     */
    public function headings(): array
    {
        return [
            'Reference Code',
            'Full Name',
            'Gender',
            'Email',
            'Phone',
            'City',
            'Organization',
            'Job Title',
            'Department',
            'Qualification',
            'Expertise / Specialization',
            'Thematic Area',
            'Presentation Title',
            'Project Status',
            'Available for Full Duration',
            'Travel Option',
            'Needs Hotel',
            'Discovery Source',
            'Invited By',
            'Previous Attendance',
            'Abstract (excerpt)',
            'Additional Projects Count',
            'Additional Projects Detail',
            'Registration Status',
            'Registered At',
        ];
    }

    /**
     * Style the header row — dark blue background, white bold text.
     */
    public function styles(Worksheet $sheet): array
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['argb' => 'FFFFFFFF'],
                    'size' => 11,
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['argb' => 'FF003B5C'],
                ],
            ],
        ];
    }

    /**
     * Column widths (in character units).
     */
    public function columnWidths(): array
    {
        return [
            'A' => 18,  // Reference Code
            'B' => 28,  // Full Name
            'C' => 10,  // Gender
            'D' => 32,  // Email
            'E' => 16,  // Phone
            'F' => 16,  // City
            'G' => 34,  // Organization
            'H' => 26,  // Job Title
            'I' => 22,  // Department
            'J' => 14,  // Qualification
            'K' => 26,  // Expertise
            'L' => 38,  // Thematic Area
            'M' => 40,  // Presentation Title
            'N' => 20,  // Project Status
            'O' => 22,  // Available
            'P' => 20,  // Travel Option
            'Q' => 16,  // Needs Hotel
            'R' => 24,  // Discovery Source
            'S' => 24,  // Invited By
            'T' => 20,  // Previous Attendance
            'U' => 50,  // Abstract
            'V' => 10,  // Extra Count
            'W' => 60,  // Extra Detail
            'X' => 16,  // Status
            'Y' => 20,  // Registered At
        ];
    }
}
