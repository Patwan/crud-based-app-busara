<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use PDF;

class PDFController extends Controller
{
    public function getPDF(){
	    //Pull all contacts
		$pro = Product::all();

		$pdf = PDF::loadView('Pdf.contact' , compact('pro'))->setPaper('a4' , 'potrait');

		return $pdf->download('contacts.pdf');
	}
}
