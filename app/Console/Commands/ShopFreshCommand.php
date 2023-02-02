<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ShopFreshCommand extends Command
{
    protected $signature = 'shop:fresh';

    protected $description = 'Command description';

    public function handle(): int
    {
        \Storage::disk('public')->deleteDirectory('brands');
        \Storage::disk('public')->deleteDirectory('products');

        $this->call('migrate:fresh', [
            '--seed' => true,
        ]);

        return self::SUCCESS;
    }
}
