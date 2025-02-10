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
        Rayon::create(['name' => 'Tajur']);
        Rayon::create(['name' => 'Cibedug']);
        Rayon::create(['name' => 'Sukasari']);
        Rayon::create(['name' => 'Cisarua']);
}
    
}