<?php

namespace App\Exports;

use App\Models\StockTransaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Collection;

class StockReportExport implements FromCollection, WithHeadings, WithMapping
{
    protected $month;
    protected $year;

    public function __construct($month = null, $year = null)
    {
        $this->month = $month;
        $this->year = $year;
    }

    public function collection(): Collection
    {
        $query = StockTransaction::with('product');

        if ($this->month) {
            $query->whereMonth('transaction_date', $this->month);
        }

        if ($this->year) {
            $query->whereYear('transaction_date', $this->year);
        }

        return $query->latest('transaction_date')->get();
    }

    public function headings(): array
    {
        return [
            'ID Transaksi',
            'Tanggal & Waktu',
            'Nama Produk',
            'Kategori',
            'Jenis Transaksi',
            'Jumlah (Pcs)',
            'Stok Sebelum',
            'Stok Sesudah',
        ];
    }

    public function map($transaction): array
    {
        return [
            $transaction->id,
            $transaction->transaction_date,
            $transaction->product->name ?? 'Produk Dihapus',
            $transaction->product->category ?? '-',
            strtoupper($transaction->type),
            $transaction->amount,
            $transaction->stock_before,
            $transaction->stock_after,
        ];
    }
}