<?php

use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultValueForUsers extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    $account = new User;

    $account->fill([
      'username' => 'rnd',
      'password' => 'ueccssrnd'
    ]);

    $account->save();
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      //
  }
}
