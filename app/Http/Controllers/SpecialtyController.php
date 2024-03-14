<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));
    }
    public function create()
    {
        return view('specialties.create');
    }

    public function sendData(Request $request)
    {
        $rules=[
            'name' => 'required|min:3'  
        ];
        
        $messages= [
            'name.required' => 'El nombre de la especialidad es obligatorio.',
            'name.min' => 'El nombre de la especialidad debe tener más de tres caracteres.'
        ];

        $this->validate($request, $rules, $messages);

        $speciality = new Specialty();
        $speciality->name = $request->input('name');
        $speciality->description = $request->input('description');
        $speciality->save();

        return redirect('/especialidades');
    }
}
