<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FinancialHelpExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected $data;

    // Pass the filtered data to the export class
    public function __construct($data)
    {
        $this->data = $data;
    }

    // Collection of data to be exported
    public function collection()
    {
        return $this->data;
    }

    // Define the headers of the Excel sheet
    public function headings(): array
    {
        return [
            ['Couple Financial Applications'], // Main heading
            [], // Empty row after heading
            [
                'S.No',
                'Case Number',
                'Name of Beneficiary',
                'Address',
                'Mobile Number',
                'Approve Date',
                'Sanctioned Amount',
                'Remarks',
                'Scheme Name'
            ]
        ];
    }

    // Map the data to the corresponding Excel columns
    public function map($row): array
    {
        static $sino = 1; // Initialize S.No

        // Convert MongoDB date format to "d-m-Y h:i a" format
        $approveDate = \Carbon\Carbon::createFromFormat('d-m-Y h:i a', $row->officer_status_date)
            ->format('d-m-Y h:i a');

        return [
            $sino++,  // Increment S.No for each row
            $row->case_id,
            $row->husband_name . ' / ' . $row->wife_name,
            $row->husband_address . ' / ' . $row->wife_address,
            $row->mobile ?? '', // Handle case where mobile is null
            $approveDate,
            $row->grand_amount,
            $row->officer_status_reason ?? '', // Handle case where remarks might be null
            $row->scheme_name
        ];
    }

    // Apply styles to the Excel sheet
    public function styles(Worksheet $sheet)
    {
        // Apply styles to the main heading
        $sheet->mergeCells('A1:I1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Apply styles to the header row
        $sheet->getStyle('A3:I3')->getFont()->setBold(true);

        // Center the headers
        $sheet->getStyle('A3:I3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    }
}
