<?php  

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTableMigration extends Migration {

	public function up()
    {
      Schema::table('users',function (Blueprint $table){
         $table->string('token');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       if (Schema::hasColumn('users', 'token')) {
   
         Schema::table('users', function (Blueprint $table) {
           $table->dropColumn('token');
       });
      }
    }
}
?>