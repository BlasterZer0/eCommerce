<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::orderBy('id', 'asc')->paginate(5);
        return view('animal.index')->with('animals',$animals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = collect(['Adopción' , 'Adoptado']);
        $gender = collect(['Macho', 'Hembra']);
        $species = collect(['Perro', 'Gato', 'Loro', 'Conejo', 'Otros']);
        $size = collect(['Pequeño', 'Mediano', 'Grande']);

        return view('animal.form', compact('status','gender','species','size'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:25'],
            'age' => ['string', 'max:10'],
            'health' => ['required', 'string', 'max:255'],
            'personality' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileExtension = $file->getClientOriginalName();
            $fileName = $fileExtension;
            $request->file('image')->move(public_path('images'), $fileName);
        }
        
        $animal = Animal::create([
            'name' => $request['name'],
            'age' => $request['age'],
            'status' => $request['status'],
            'gender' => $request['gender'],
            'species' => $request['species'],
            'size' => $request['size'],
            'health' => $request['health'],
            'personality' => $request['personality'],
            'description' => $request['description'],
            'image' => $fileName
        ]);
        
        //Session::flash('mensaje', 'Registro Creado con Exito!');
        //$request->session()->flash('mensaje', 'Registro Creado con Exito!');
        
        return redirect()->route('animal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        $status = collect(['Adopción' , 'Adoptado']);
        $gender = collect(['Macho', 'Hembra']);
        $species = collect(['Perro', 'Gato', 'Loro', 'Conejo', 'Otros']);
        $size = collect(['Pequeño', 'Mediano', 'Grande']);
        return view('animal.form', compact('animal','status','gender','species','size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:25'],
            'age' => ['string', 'max:10'],
            'health' => ['required', 'string', 'max:255'],
            'personality' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $animal->name = $request['name'];
        $animal->age = $request['age'];
        $animal->status = $request['status'];
        $animal->gender = $request['gender'];
        $animal->species = $request['species'];
        $animal->size = $request['size'];
        $animal->health = $request['health'];
        $animal->personality = $request['personality'];
        $animal->description = $request['description'];

        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileExtension = $file->getClientOriginalName();
            $fileName = $fileExtension;
            $request->file('image')->move(public_path('images'), $fileName);
            $animal->image = $fileName;
        }

        $animal->save();
        
        //Session::flash('message', 'Registro Editado con Exito!');
        
        return redirect()->route('animal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
        //Session::flash('mensaje', "Registro eliminado con exito!");
        return redirect()->route('animal.index');
    }
}
