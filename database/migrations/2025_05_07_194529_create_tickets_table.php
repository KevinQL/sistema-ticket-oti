<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('status', ['open', 'in_progress', 'resolved', 'closed']);
            $table->enum('priority', ['low', 'medium', 'high', 'critical']);
            $table->enum('service_type', ['preventive', 'corrective', 'training', 'installation', 'other']);
            $table->foreignId('equipment_id')->constrained('equipment');
            $table->foreignId('user_id')->constrained('users'); // Usuario que reporta
            $table->foreignId('assigned_to')->nullable()->constrained('users'); // Técnico asignado
            $table->timestamp('resolved_at')->nullable();
            $table->text('resolution_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
