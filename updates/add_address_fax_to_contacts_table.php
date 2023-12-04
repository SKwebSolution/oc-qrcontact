<?php namespace Ideaseven\Qrcontact\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class AddAddresFaxToContactsTable extends Migration
{
    public function up()
    {
        Schema::table('ideaseven_qrcontact_contacts', function (Blueprint $table) {
            $table->string('address');
            $table->string('fax');
        });
    }

    public function down()
    {
    }
}
