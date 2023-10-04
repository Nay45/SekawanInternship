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

class LaporanExport implements WithMultipleSheets {
    /**
     * @return array
     */
    public function sheets(): array
    {
        // Data untuk lembar pertama (LaporanPeriodik)
        $laporanPeriodik = LaporanPeriodik::select('id', 'waktu', 'total_aktivitas')->get();

        // Data untuk lembar kedua (Pemesanan)
        $pemesanan = Pemesanan::select('id', 'kendaraan', 'driver', 'approval_id', 'approved')->get();

        return [
            new LaporanPeriodikSheet($laporanPeriodik),
            new PemesananSheet($pemesanan),
        ];
    }
}

class LaporanPeriodikSheet implements FromCollection, WithHeadings {
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return ["Id Laporan Periodik", "Waktu", "Total Aktivitas Approval"];
    }
}

class PemesananSheet implements FromCollection, WithHeadings {
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return ["Id Pemesanan", "Nama Kendaraan", "Nama Driver", "Approval Id", "Approved"];
    }
}