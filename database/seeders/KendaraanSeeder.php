<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Kendaraan;
use Illuminate\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        try {
            Kendaraan::insert([
                ['id' => 1, 'nama' => 'kijang', 'created_at' => now(), 'updated_at' => now()],
                ['id' => 2, 'nama' => 'inova', 'created_at' => now(), 'updated_at' => now()],
                ['id' => 3, 'nama' => 'xenia', 'created_at' => now(), 'updated_at' => now()],
            ]);
            DB::commit();
            $this->command->info("kendaraan berhasil ditambahkan.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->command->info($e->getMessage());
        }
    }
}
