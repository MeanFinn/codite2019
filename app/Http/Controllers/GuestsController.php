<?php

namespace App\Http\Controllers;

use App\Guest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GuestsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $checker = Guest::all();
    $guest = new Guest;
    $counter = 0;

    $guest->fill($request->only([
      'last_name',
      'first_name',
      'middle_initial',
      'school',
      'position'
    ]));

    foreach ($checker as $check) {
      if ($check->last_name == $guest->last_name) {
        $counter++;
        if ($check->first_name == $guest->first_name) {
          $counter++;
          if ($check->middle_initial == $guest->middle_initial) {
            $counter++;
          }
        }
      }
    }

    if ($counter >= 3) {
      return redirect('');
    }

    $guest->created_at = Carbon::now('+8:00');
    $guest->updated_at = Carbon::now('+8:00');
    $guest->save();

    return redirect('');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $guest = Guest::find($id);
    if ($guest != null) {
      $guest->delete();
      return redirect('logs');
    }
  }
}