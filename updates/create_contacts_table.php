<?php namespace Ideaseven\Qrcontact\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('ideaseven_qrcontact_contacts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('web_url');
            $table->text('company');
            $table->string('office_number');
            $table->string('home_number');
            $table->string('mobile_number');
            $table->string('office_email');
            $table->string('home_email');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ideaseven_qrcontact_contacts');
    }
}
