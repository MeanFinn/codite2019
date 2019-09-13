	<?php

namespace App\Http\Controllers;

use Auth;
use App\Guest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\AccountsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ExcelReport extends Controller
{
	public function export() {
		$user_id = auth()->user()->id;
		$name = User::find($name);
		$school = User::find($school);
		$position = User::find($position);
		$timestamp = Carbon::now('+8:00');

		return Excel::download(new AccountsExport, $name . ' Accounts ' . $school . ' Accounts '. $position . ' Accounts ' . $timestamp . '.xlsx');
	}
}