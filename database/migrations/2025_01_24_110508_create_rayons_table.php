<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateRayonsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rayons', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });
        Schema::table('siswa', function (Blueprint $table) {
            $table->string('rayon')->nullable()->change();
    }
    /**
     * Reverse the migrations.
     */
    
    public function down(): void
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->string('rayon')->nullable(false)->change();
        });
        Schema::dropIfExists('rayons');
    }
}