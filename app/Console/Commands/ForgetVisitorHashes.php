<?php

namespace App\Console\Commands;

use App\Support\Analytics\Recorder;
use Illuminate\Console\Command;

class ForgetVisitorHashes extends Command
{
    protected $signature = 'analytics:forget-ip {--days=90}';

    protected $description = 'Kosongkan sidik IP pengunjung yang lebih lama dari batas hari, statistik tetap disimpan';

    public function handle(): int
    {
        $count = Recorder::forgetOldVisitorHashes((int) $this->option('days'));

        $this->info("Sidik IP dikosongkan pada {$count} kunjungan.");

        return self::SUCCESS;
    }
}
