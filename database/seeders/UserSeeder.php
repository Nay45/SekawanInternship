<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
            User::insert([
                ['id' => 1, 'name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => bcrypt("admin"), 'role' => 'admin', 'created_at' => now(), 'updated_at' => now()],
                ['id' => 2, 'name' => 'Approval', 'email' => 'approval@gmail.com', 'password' => bcrypt(1234567890), 'role' => 'approval', 'created_at' => now(), 'updated_at' => now()],
                ['id' => 3, 'name' => 'Approval 2', 'email' => 'approval2@gmail.com', 'password' => bcrypt(1234567890), 'role' => 'approval', 'created_at' => now(), 'updated_at' => now()],
            ]);
            DB::commit();
            $this->command->info("User berhasil ditambahkan.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->command->info($e->getMessage());
        }
    }
}
