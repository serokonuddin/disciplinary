<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplinary', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->date('go_date');
            $table->string('offence');
            $table->string('punishment_type');
            $table->string('punishment_line_1');
            $table->string('punishment_line_2');
            $table->string('remarks');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disciplinary');
    }
}
