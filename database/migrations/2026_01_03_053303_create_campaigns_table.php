<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("campaigns", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug")->unique();
            $table->string("cover")->nullable();
            $table->text("description")->nullable();
            $table->boolean("is_public")->default(false);
            $table->string("status")->default("draft");
            $table->string("system")->default("dnd5e");
            $table->unsignedTinyInteger("start_level")->default(1);
            $table->unsignedTinyInteger("max_level")->default(20);
            $table->json("metadata")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("campaigns");
    }
};
