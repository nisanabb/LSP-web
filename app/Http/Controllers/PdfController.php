<?php

namespace App\Http\Controllers;

use App\Models\CalonMahasiswa;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function index()
    {
        $calonMahasiswas = CalonMahasiswa::all();

        return view('calon_mahasiswa.index', compact('students'));
    }

    public function generatePdf()
    {
        $calonMahasiswas = CalonMahasiswa::all();

        $pdf = PDF::loadView('pdf.calon_mahasiswa_pdf', compact('students'));

        return $pdf->download('calon_mahasiswa.pdf');
    }
}