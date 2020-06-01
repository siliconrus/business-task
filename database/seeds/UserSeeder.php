<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction();

            User::insert([
                [
                    'name' => 'User Business',
                    'login' => 'user',
                    'email' => 'user@user.com',
                    'is_admin' => 0,
                    'email_verified_at' => Carbon::now(),
                    'password' => Hash::make('user'),
                ],
                [
                    'name' => 'Admin Business',
                    'login' => 'admin',
                    'email' => 'admin@admin.com',
                    'is_admin' => 1,
                    'email_verified_at' => Carbon::now(),
                    'password' => Hash::make('admin'),
                ],
            ]);

            DB::commit();
        } catch(Exception $e) {
            DB::rollback();

            throw $e;
        }
    }
}
