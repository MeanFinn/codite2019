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
		$name = Guest::find($name);
		$school = Guest::find($school);
		$position = Guest::find($position);
		$timestamp = Carbon::now('+8:00');

		return Excel::download(new AccountsExport, $name . ' Accounts ' . $school . ' Accounts '. $position . ' Accounts ' . $timestamp . '.xlsx');
	}
}