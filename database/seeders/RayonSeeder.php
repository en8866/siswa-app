<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Rayon;
class RayonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rayons = ['Cisarua',
                'Cicurug',
                'Ciawi',
                'Wikrama',
                'Sukasari',
                'Tajur',
                'Cibedug'];

        foreach ($rayons as $rayon) {
            Rayon::create(['name' => $rayon]);
        }
    }
}