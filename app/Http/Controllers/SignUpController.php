<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignUpController extends Controller
{
public function store(Request $request)
{
// Validate the form data
$validated = $request->validate([
'nama' => 'required|string|max:255',
'nisn' => 'required|string|max:255',
'tgl_lahir' => 'required|date',
'tempat_lahir' => 'required|string|max:255',
'gender' => 'required|string|max:1',
'anak_ke' => 'required|integer',
'alamat_santri' => 'required|string',
'no_tlp_santri' => 'required|string',
'nama_ayah' => 'required|string',
'nama_ibu' => 'required|string',
'alamat_ortu' => 'required|string',
'no_tlp_ortu' => 'required|string',
'pekerjaan_ayah' => 'required|string',
'pekerjaan_ibu' => 'required|string',
'nama_wali' => 'required|string',
'alamat_wali' => 'required|string',
'no_tlp_wali' => 'required|string',
'pekerjaan_wali' => 'required|string',
'kk_file' => 'required|file|mimes:jpeg,png,pdf|max:2048',
]);

// Store the data into the database or process as needed

// Redirect to the welcome page after submission
return redirect()->route('welcome');
}
}