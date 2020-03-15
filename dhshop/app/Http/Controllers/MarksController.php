<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mark;
use App\Product;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Marks = Mark::all(); //guardo todas las marcas en una variable
        $Marks->shift();    //quito el registro "sin definir"
        return view('adminMarks', compact('Marks')); //retorno la vista de las marcas pasandole la variable anterior
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
            [
                'name' => 'required|unique:marks|max:20|min:2'
            ],

            [
                'required' => 'Completar campo',
                'unique' => 'El Nombre ya se encuentra en la base de datos',
                'min' => 'debe ingresar más de 1 letras',
                'max' => 'debe ingresar menos de 20 letras'
            ]
        );


        $Mark = new Mark;
        $Mark->name = $request['name'];

        $Mark->save();

        return redirect('adminMarks');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, 
            [
                'name' => 'required|unique:marks|max:20|min:2'
            ],

            [
                'required' => 'Completar campo',
                'unique' => 'El Nombre ya se encuentra en la base de datos',
                'min' => 'debe ingresar más de 2 letras',
                'max' => 'debe ingresar menos de 20 letras'
            ]
        );


        $Mark = Mark::find($id);
        $Mark->name = $request['name'];

        $Mark->save();

        return redirect('adminMarks');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //en el caso de que haya productos de esta marca, modifico su campo de marca a "sin definir"
        $Products = Product::where('mark_id','=', $id)->get(); //obtengo los productos que pertenezcan a la marca que sera eliminada
        foreach($Products as $Product){
            $Product->mark_id = -1;
            $Product->save();
        }


        $Mark = Mark::find($id);
        $Mark->delete();
        return redirect('/adminMarks');
    }
}
