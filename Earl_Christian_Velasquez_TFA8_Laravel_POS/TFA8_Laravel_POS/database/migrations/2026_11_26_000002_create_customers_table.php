<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up():void { Schema::create('customers',function(Blueprint $table){$table->id();$table->string('full_name');$table->string('email')->index();$table->string('phone',30)->nullable();$table->string('address',500)->nullable();$table->string('country',100)->nullable();$table->string('status')->default('active');$table->timestamps();});} public function down():void{Schema::dropIfExists('customers');} };
