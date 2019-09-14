<?php

namespace App\Http\Controllers;

use Auth;
use App\Guest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
	public function register() {
		$year = Carbon::now('+8:00');
		return view('register', [
			'year' => $year,
		]);
	}

	public function logs(Request $request) {
		$total = Guest::all();
		$page = 0;
		$counter = 0;
		$checker = 0;
		$checked = array();

		foreach($total as $guest) {
			$repeat = 0;
			if ($counter == 0) {
				$checked[$counter] = $guest;
				$counter++;
				continue;
			}
			for ($i=0; $i < $counter; $i++) { 
				if ($guest->last_name == $checked[$i]->last_name) {
					$repeat++;
					if ($guest->first_name == $checked[$i]->first_name) {
						$repeat++;
						if ($guest->middle_initial == $checked[$i]->middle_initial) {
							$repeat++;
						}
					}
				}
			}
			if ($repeat >= 3) {
				return redirect('delete/' .$guest->id);
			} else {
				$checked[$counter] = $guest;
				$counter++;
			}
		}

		if ($request->search) {
      // *
      //  * Different types of where functions: 
      //  * 
      //  * where('column', 'value') - default and simplest where function; Account::where()->where() = SELECT ... WHERE ... AND WHERE ...
      //  *      where('column', 'LIKE', 'value')
      //  * orWhere() - only exists after a self-standing where function; Account::where()->orWhere() = SELECT ... WHERE ... OR WHERE
      //  * whereYear(), whereMonth(), whereDate(), whereBetween() - where functions for dates
      //  * ...and many others

			$guests = Guest::where('first_name', 'LIKE', '%' . $request->search . '%')
			->orWhere('middle_initial', 'LIKE', '%' . $request->search . '%')
			->orWhere('last_name', 'LIKE', '%' . $request->search . '%')
			->orWhere('school', 'LIKE', '%' . $request->search . '%')
			->orWhere('position', 'LIKE', '%' . $request->search . '%')
			->get();

			$page ++;
		} else {	
			$guests = Guest::orderBy('updated_at', 'desc')->paginate(50);
		}

		return view('logs', [
			'guests' => $guests,
			'total' => $total,
			'request' => $request,
			'page' => $page,
		]);
	}

	public function login() {
		$message = NULL;
		if(Auth::user()) {
			return redirect('logs');
		} else {
			return view('login', [
				'message' => $message
			]);
		}
	}
}
