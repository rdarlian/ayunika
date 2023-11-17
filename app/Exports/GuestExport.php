<?php

namespace App\Exports;

use App\Models\Guest;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class GuestExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $id;
    function __construct($id)
    {
        $this->id = $id;
    }
    public function collection()
    {
        $data = Guest::where('user_id', $this->id)->get();
        return $data;
    }
    public function map($item): array
    {
        return [
            $item->id,
            $item->name,
            $item->nohp,
            $item->status
        ];
    }
    public function headings(): array
    {
        return
            [
                '#',
                'Nama',
                'No WA',
                'Status',
            ];
    }
}
