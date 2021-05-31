<?php

namespace WebId\Cafe\Commands;

use Illuminate\Console\Command;

class CafeCommand extends Command
{
    public $signature = 'cafe';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
