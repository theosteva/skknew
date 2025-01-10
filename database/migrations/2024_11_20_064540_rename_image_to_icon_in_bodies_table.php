<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameImageToIconInBodiesTable extends Migration
{
    public function up()
    {
        Schema::table('bodies', function (Blueprint $table) {
            $table->renameColumn('image', 'icon'); // Mengubah nama kolom dari image ke icon
        });
    }

    public function down()
    {
        Schema::table('bodies', function (Blueprint $table) {
            $table->renameColumn('icon', 'image'); // Mengembalikan nama kolom jika rollback
        });
    }
}