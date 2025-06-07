<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_profiles_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel users
            $table->enum('status', [
                'jomblo', 
                'hts', 
                'backburner', 
                'gak laku', 
                'toxic relationship', 
                'healthy relationship', 
                'tidak direstui', 
                'diselingkuhin', 
                'gamon'
            ]);
            $table->text('bio')->nullable(); // Isi hati sih, bisa kosong
            $table->integer('age')->nullable(); // Usia
            $table->string('profile_picture')->nullable(); // Foto profil (bisa disimpan sebagai URL)
            $table->enum('gender', ['male', 'female', 'other'])->nullable(); // Gender
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
