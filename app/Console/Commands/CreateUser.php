<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Rules\NoLineBreaks;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class CreateUser extends Command
{
    protected $signature = 'arsytech:user {--name=} {--email=} {--password=}';

    protected $description = 'Buat atau perbarui akun internal untuk masuk ke dashboard';

    public function handle(): int
    {
        $name = $this->option('name') ?: $this->ask('Nama');
        $email = $this->option('email') ?: $this->ask('Email');
        $password = $this->option('password') ?: $this->secret('Password (minimal 8 karakter)');

        $validator = Validator::make(compact('name', 'email', 'password'), [
            'name' => ['required', 'string', 'max:100', new NoLineBreaks],
            'email' => ['required', 'email:rfc,filter', 'max:150', new NoLineBreaks],
            'password' => ['required', Password::min(8)],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }

        $user = User::updateOrCreate(['email' => $email], ['name' => $name, 'password' => $password]);

        $this->info(($user->wasRecentlyCreated ? 'Akun dibuat: ' : 'Akun diperbarui: ').$user->email);

        return self::SUCCESS;
    }
}
