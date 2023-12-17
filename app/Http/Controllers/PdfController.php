<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use PDF;
use App\Models\Student;

class PdfController extends Controller
{
    public function generatePdf()
    {
        $students = Student::all();

        $pdf = PDF::loadView('pdf.student_list', $students);

        // Save the PDF to the public directory
        $pdf->save(public_path('pdf/student_list.pdf'));

        return $pdf->download('student_list.pdf');
    }
}
