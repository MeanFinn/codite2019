<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;
use Carbon\Carbon;

class ReportController extends Controller
{
	public function create() 
	{
		$guests = Guest::orderBy('last_name', 'asc')->get();
		// $july1am = $guests->where('created_at', '<=', '2019-07-01 11:30:00');
		$september12am = $guests->where('created_at', '<', '2019-09-12 11:30:00')->where('created_at', '>', '2019-07-01 23:59:59');
		$september12pm = $guests->where('created_at', '>=', '2019-09-12 11:30:00')->where('created_at', '<', '2019-07-08 00:00:00');
		// $july8pm = $guests->where('created_at', '>=', '2019-07-08 12:00:00');

		// $july1am = $guests->where('created_at', '<', '2019-06-29 12:00:00');
		// $july2am = $guests->where('created_at', '>=', '2019-06-29 12:00:00')->where('created_at', '<', '2019-06-30 00:00:00');
		// $july2pm = $guests->where('created_at', '>=', '2019-06-30 11:30:00')->where('created_at', '<', '2019-07-01 00:00:00');
		// $july8pm = $guests->where('created_at', '>=', '2019-07-01 00:00:00');

		$header = array(
			'size' => 11,
			'bold' => true
		);
		$tableheader = array(
			'size' => 11,
		);
		$title = array(
			'size' => 12, 
			'bold' => true
		);
		$columnTitle = array('bold' => true);
		$styleTable = array(
			'cantSplit' => true, 
			'borderColor' => 'A9A9A9', 
			'borderSize' => 6, 
			'cellMargin' => 50
		);
		$styleCell = array(
			'valign' => 'center',
			'align' => 'center'
		);
		$styleFirstRow = array('bgColor' => 'D3D3D3');

		$phpWord = new \PhpOffice\PhpWord\PhpWord();
		$phpWord->setDefaultFontName('Arial');
		$phpWord->setDefaultFontSize(10);

		$section = $phpWord->addSection();

		$section->addText(htmlspecialchars('General Orientation 2019 Registration'), $title, array('align' => 'center'));
		for($i = 1; $i <= 4; $i++)
		{
			if ($i != 1)
			{
				$section->addTextBreak();
			}
			switch($i) 
			{
				// case 1:
				// $data = $july1am;
				// $section->addText(htmlspecialchars('July 1, 2019 (AM Session)'), $header);
				// break;
				case 2:
				$data = $september12am;
				$section->addText(htmlspecialchars('September 12, 2019 (AM Session)'), $header);
				break;
				case 3:
				$data = $september12pm;
				$section->addText(htmlspecialchars('September 12, 2019 (PM Session)'), $header);
				break;
				// case 4:
				// $data = $july8pm;
				// $section->addText(htmlspecialchars('July 8, 2019 (PM Session)'), $header);
				// break;
			}
			// $undefined = $data->where('college', '=', 'undefined');
			// $law = $data->where('college', '=', 'law');
			// $dent = $data->where('college', '=', 'dent');
			// $cas = $data->where('college', '=', 'cas');
			// $ccss = $data->where('college', '=', 'ccss');
			// $cba = $data->where('college', '=', 'cba');
			// $eng = $data->where('college', '=', 'eng');
			// $educ = $data->where('college', '=', 'educ');
			// $cfad = $data->where('college', '=', 'cfad');
			// $colleges = array($undefined, $law, $dent, $cas, $ccss, $cba, $eng, $educ, $cfad);

			// foreach ($colleges as $college)
			// {
			// 	if (count($college) > 0)
			// 	{
			// 		$phpWord->addTableStyle('Table', $styleTable, $styleFirstRow);
			// 		$table = $section->addTable('Table');
			// 		$table->addRow();
			// 		foreach($college as $students)
			// 		{
			// 			switch($students->college)
			// 			{
			// 				case 'undefined':
			// 				$table->addCell(10000, array('gridspan' => 3))->addText(htmlspecialchars('No Specified College'), $tableheader, array('align' => 'center'));
			// 				break;
			// 				case 'law':
			// 				$table->addCell(10000, array('gridspan' => 3))->addText(htmlspecialchars('College of Law'), $tableheader, array('align' => 'center'));
			// 				break;
			// 				case 'dent':
			// 				$table->addCell(10000, array('gridspan' => 3))->addText(htmlspecialchars('College of Dentistry'), $tableheader, array('align' => 'center'));
			// 				break;
			// 				case 'cas':
			// 				$table->addCell(10000, array('gridspan' => 3))->addText(htmlspecialchars('College of Arts and Sciences'), $tableheader, array('align' => 'center'));
			// 				break;
			// 				case 'ccss':
			// 				$table->addCell(10000, array('gridspan' => 3))->addText(htmlspecialchars('College of Computer Studies and Systems'), $tableheader, array('align' => 'center'));
			// 				break;
			// 				case 'cba':
			// 				$table->addCell(10000, array('gridspan' => 3))->addText(htmlspecialchars('College of Business Administration'), $tableheader, array('align' => 'center'));
			// 				break;
			// 				case 'eng':
			// 				$table->addCell(10000, array('gridspan' => 3))->addText(htmlspecialchars('College of Engineering'), $tableheader, array('align' => 'center'));
			// 				break;
			// 				case 'educ':
			// 				$table->addCell(10000, array('gridspan' => 3))->addText(htmlspecialchars('College of Education'), $tableheader, array('align' => 'center'));
			// 				break;
			// 				case 'cfad':
			// 				$table->addCell(10000, array('gridspan' => 3))->addText(htmlspecialchars('College of Fine Arts, Architecture and Design'), $tableheader, array('align' => 'center'));
			// 				break;
			// 			}
			// 			break;
					$table->addRow();
					$table->addCell(3750)->addText(htmlspecialchars('Name'), $columnTitle, $styleCell);
					$table->addCell(3750)->addText(htmlspecialchars('Course'), $columnTitle, $styleCell);
					$table->addCell(2500)->addText(htmlspecialchars('Time Registered'), $columnTitle, $styleCell);

					foreach ($college as $guests)
					{
						$table->addrow();
						$table->addCell(3750)->addText(htmlspecialchars($guests->last_name.", ".$guests->first_name." ".$guests->middle_intial));
						$table->addCell(3750)->addText(htmlspecialchars($guests->course));
						$dateTime = Carbon::parse($guests->created_at, 'UTC');
						$table->addCell(2500)->addText(htmlspecialchars($dateTime->isoFormat('MMMM D - h:mm a')));
					}
					$section->addTextBreak();
				}
				

		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$objWriter->save(storage_path('General Orientation 2019 Report.docx'));

		return response()->download(storage_path('General Orientation 2019 Report.docx'));
	}
}