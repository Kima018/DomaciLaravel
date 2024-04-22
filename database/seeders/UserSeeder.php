<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = $this->command->getOutput()->ask('Unesite email:');

        $pattern = '/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/';

        if ($email === null | !preg_match($pattern, $email)) {
            $this->command->getOutput()->error('Mejl nije validan!');
        }

        if (User::where('email', $email)->exists()) {
            $this->command->getOutput()->error('Korisnik vec postoji!');
        }

        $name = $this->command->getOutput()->ask('Unesite ime:');

        if ($name === null) {
            $this->command->getOutput()->error('Niste uneli ime');
        }

        $password = $this->command->getOutput()->ask('Unesite sifru');

        if ($password === null) {
            $this->command->getOutput()->error('Niste uneli sifru za korisnika');
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        echo 'Korisnik upisan u tabelu';
    }
}

//$amount = $this->command->ask("koliko korisnika zelite da unesemo?", 300);
//
//        $password = $this->command->ask('Koja sifra teba biti?',123456);
//
//        $faker = Factory::create();
//        $this->command->getOutput()->progressStart($amount);
//        for ($i = 0; $i < $amount; $i++) {
//            if (User::where('email', $email)->exists()) {
//            $this->command->getOutput()->error('Korisnik vec postoji!');
//                dd();
//        }
//            User::create([
//                'name' => $faker->name,
//                'email' => $faker->email,
//                'password' => Hash::make($password),
//            ]);
//
//            $this->command->getOutput()->progressAdvance();
//        }
//        $this->command->getOutput()->progressFinish();
