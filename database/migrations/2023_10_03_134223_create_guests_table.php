<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('addressing');
            $table->string('email');
            $table->string('key');
            $table->enum('status', ['invited', 'accepted', 'declined'])->default('invited');
            $table->timestamp('invitation_sent_at')->nullable();
            $table->unsignedInteger('event_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
