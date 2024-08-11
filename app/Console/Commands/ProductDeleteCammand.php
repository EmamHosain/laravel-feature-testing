<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class ProductDeleteCammand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all products';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (Product::count() > 0) {
            foreach (Product::all() as $product) {
                $product->delete();
            }
            $this->info('Product deleted successfully.');
        } else {
            $this->info('Product Not Found.');
        }

    }
}
