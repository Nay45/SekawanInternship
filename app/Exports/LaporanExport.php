<?php

namespace App\Exports;

use App\Models\History;
use App\Models\pemesanan;
use Illuminate\Support\Carbon;
use App\Models\LaporanPeriodik;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class LaporanExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $histories = LaporanPeriodik::select('id', 'waktu', 'total_aktivitas')->get();
        return $histories;
    }
    public function headings(): array
    {
        return ["Id", "waktu", "total_aktivitas_approval"];
    }
}