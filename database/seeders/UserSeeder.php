<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amount = $this->command->ask("koliko korisnika zelite da unesemo?", 300);

        $password = $this->command->ask('Koja sifra teba biti?',123456);

        $faker = Factory::create();
        $this->command->getOutput()->progressStart($amount);
        for ($i = 0; $i < $amount; $i++) {

            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make($password),

            ]);

            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();

    }
}
