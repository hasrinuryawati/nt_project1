<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OrderExport implements FromCollection, WithStyles, ShouldAutoSize
{
    protected $header;
    protected $data;

    public function __construct(array $header, array $data)
    {
        $this->header = $header;
        $this->data = $data;
    }

    public function collection()
    {
        return collect([$this->header])->merge($this->data);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}