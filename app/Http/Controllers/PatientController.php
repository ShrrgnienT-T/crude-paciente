<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       
        $patients = Patient::with('county');

        $request->filled('id') ? $patients->findOrFail($request->id) : '';

        // TODO temos que corrigir a pesquisa por data de nascimento


        $request->filled('search') ? $patients->where('name', 'like', '% '. $request->search. '%') 
       ->orWhere('cpf', $request->search) 
       ->orWhere('cns', $request->search) 
    //    ->orWhere('birth', $request->search) 
       ->orWhere('email', 'like', '% '. $request->search. '%') 
       ->orWhere('phone', $request->search) 
       ->orWhereHas('county', function($query) use ($request){
        $query->where('name', 'like', '%' . $request->search . '%');
    })
        
        : '';

        return view('patients.index', [
            'patients' => $patients->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request)
    {
        $patient = Patient::create($request->safe()->all());

        return redirect()->route('patients.index', ['id' => $patient->id])->withSuccess('Paciente cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return view ('patients.show',['patient'=>$patient-> load('county')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view ('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        $patient->update($request->safe()->all());
        return redirect()->route('patients.index', ['id'=>$patient->id])->withSuccess('Paciente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
       $patient->delete();
       return redirect('patients')->withSuccess('Paciente apagado com sucesso');
    }



    public function pdf(Patient $patient)
    {
        // dd($patient);
        // $data = $patient->load('county');
        $pdf = Pdf::loadView('patients.pdf', ['data'=> $patient->load('county')]);

        return $pdf->stream($patient->name . ".pdf");
        

    }
}