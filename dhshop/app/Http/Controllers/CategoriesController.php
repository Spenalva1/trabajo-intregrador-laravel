<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categories = Category::all();  //guardo todas las categorias en una variable
        $Categories->shift();   //quito el registro "sin definir" de la coleccion
        return view('adminCategories', compact('Categories'));  //retorno la vista de las categorias pasandole la variable anterior
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
                'name' => 'required|unique:categories|max:20|min:2'
            ],

            [
                'required' => 'Completar campo',
                'unique' => 'La categoria ya se encuentra en la base de datos',
                'min' => 'debe ingresar más de 2 letras',
                'max' => 'debe ingresar menos de 20 letras'
            ]
        );


        $Category = new Category;
        $Category->name = $request['name'];

        $Category->save();

        return redirect('adminCategories');
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
                'name' => 'required|unique:categories|max:20|min:2'
            ],

            [
                'required' => 'Completar campo',
                'unique' => 'La categoria ya se encuentra en la base de datos',
                'min' => 'debe ingresar más de 2 letras',
                'max' => 'debe ingresar menos de 20 letras'
            ]
        );


        $Category = Category::find($id);
        $Category->name = $request['name'];

        $Category->save();

        return redirect('adminCategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //en el caso de que haya productos de esta categoria, modifico su campo de categoria a "sin definir"
        $Products = Product::where('category_id','=', $id)->get(); //obtengo los productos que pertenezcan a la categoria que sera eliminada
        foreach($Products as $Product){
            $Product->category_id = -1;
            $Product->save();
        }

        $Category = Category::find($id);
        $Category->delete();
        return redirect('/adminCategories');
    }
}
