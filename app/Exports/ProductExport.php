<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class ProductExport implements WithHeadings, FromCollection, ShouldAutoSize, WithEvents
{

    public function registerEvents(): array
    {
        $styleArray = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => ['argb' => 'FFFF0000'],
                ],
            ],
        ];
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:L1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Arial')->setSize(14);
            },
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {

        return [
            '#',
            'Kode Product',
            'Kode Cabang',
            'Kode Kategori',
            'Nama Produk',
            'Tipe Produk',
            'Harga Produk',
            'Diskon Produk',
            'Status Produk',
            'Deskpripsi Produk',
        ];

    }
    public function collection()
    {
        $data = DB::table('t_product')->where('master_cabang_code',Auth::user()->access_cabang)->get();
        return $data;
    }
}
