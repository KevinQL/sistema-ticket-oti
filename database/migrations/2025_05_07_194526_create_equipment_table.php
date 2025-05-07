
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // PC, Impresora, etc.
            $table->string('brand');
            $table->string('model');
            $table->string('serial_number')->unique();
            $table->enum('status', ['operational', 'maintenance', 'repair', 'decommissioned']);
            $table->foreignId('office_id')->constrained('offices');
            $table->text('specifications')->nullable();
            $table->date('purchase_date')->nullable();
            $table->date('warranty_expiration')->nullable();
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
        Schema::dropIfExists('equipment');
    }
}
