<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string("titre");
            $table->text("description");
            $table->datetime("date");
            $table->string("lieu");
            $table->string("duree");
            $table->integer("nbr_places");
            $table->enum("acceptation",["automatique","manuelle"]);
            $table->boolean("is_valid")->default(0);
            $table->string("img");
            $table->decimal('prix', 10, 2);
            $table->foreignId('categorie_id')->constrained('categories');
            $table->foreignId('organisateur_id')->nullable()->constrained('users');
            $table->softDeletes(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};
