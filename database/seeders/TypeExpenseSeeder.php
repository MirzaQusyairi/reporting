<?php

namespace Database\Seeders;

use App\Models\TypeExpense;
use Illuminate\Database\Seeder;

class TypeExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeExpense::create([
            'type' => 'Belanja Natura dan Pakan-Natura'
        ]);
        TypeExpense::create([
            'type' => 'Belanja Makanan dan Minuman Aktifitas Lapangan'
        ]);
        TypeExpense::create([
            'type' => 'Honorarium Narasumber atau Pembahas, Moderator, Pembawa Acara dan Panitia'
        ]);
        TypeExpense::create([
            'type' => 'Belanja Jasa Tenaga Pelayanan Umum'
        ]);
        TypeExpense::create([
            'type' => 'Belanja Sewa Alat Angkutan Apung Bermotor untuk Penumpang'
        ]);
        TypeExpense::create([
            'type' => 'Belanja Sewa Peralatan Umum'
        ]);
        TypeExpense::create([
            'type' => 'Belanja Sewa Bangunan Gedung Tempat Kerja Lainnya'
        ]);
        TypeExpense::create([
            'type' => 'SPPD / Perjalanan Dinas'
        ]);
    }
}
