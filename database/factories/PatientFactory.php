<?php

namespace Database\Factories;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function index(Patient $patients)
    {
        
       
        return view ('patients.index', ['patients'=> $patients->get()]);
    }
}
