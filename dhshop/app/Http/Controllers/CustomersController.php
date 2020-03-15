<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Cart;
use App\Receipt;
use App\ReceiptProduct;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Customers = Customer::all();
        return view('adminCustomers', compact('Customers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $User = Auth::user();
        if ($User == null) { //verifico que haya un usuario logeado
            return redirect('/login');
        }
        return view('/profile', compact('User'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $Customer = Customer::find($request['id']);

        //en el caso de que no se ingrese una contraseña nueva, este campo no se validará
        $newPass = "";
        if (strlen($request['password']) > 0) {
            $newPass = 'string|min:8|confirmed';
        }

        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $Customer->id,
            'password' => $newPass,
            'image' => 'mimes:jpg,jpeg,png,svg,gif',
            'dni' => 'required|numeric|unique:users,dni,' . $Customer->id,
            'birthdate' => 'required|before:18 years ago',
            'phone' => 'required|numeric',
            'address' => 'required|string'
        ], [
            'required' => 'Completar campo',
            'email' => 'Formato de email incorrecto',
            'email.unique' => 'Ya existe un usuario con el email ingresado',
            'dni.unique' => 'Ya existe un usuario con el dni ingresado',
            'mimes' => 'Tiene que ser un archivo con una de las siguientes extensiones: .jpg, .png, .gif, .svg',
            'before' => 'Tienes que ser mayor a 18 años'
        ]);

        if (isset($request['image'])) {
            @unlink(public_path('user_img/') . $Customer->image);
            $imageName = time() . '.' . $request['image']->getClientOriginalExtension();
            $request['image']->move(public_path('user_img/'), $imageName);
            $Customer->image = $imageName;
        }

        $Customer->first_name = $request['first_name'];
        $Customer->last_name = $request['last_name'];
        $Customer->email = $request['email'];
        $Customer->password = Hash::make($request['password']);
        $Customer->dni = $request['dni'];
        $Customer->birthdate = $request['birthdate'];
        $Customer->phone = $request['phone'];
        $Customer->address = $request['address'];

        $Customer->save();

        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Customer = Customer::find($id);


        $Cart = Cart::where('user_id', '=', $Customer->id)->get();
        foreach ($Cart as $CartItem) {
            $CartItem->delete(); // Borrar los productos del carrito
        }


        $receipts = Receipt::where('user_id','=', $id)->get();
        foreach ($receipts as $receipt) {
            $productsBought = ReceiptProduct::where('receipt_id', '=', $receipt->id)->get();
            if(!$productsBought->isEmpty()){
                foreach($productsBought as $productBought){
                    $productBought->delete(); // Borrar los registros de la tabla receiptsproducts que contengan a este cliente
                }
            }
            $receipt->delete(); // Borrar los registros de la tabla receipts que contengan a este cliente
        }

        @unlink(public_path('Customer_img/') . $Customer->image);
        $Customer->delete();
        return redirect('/adminCustomers');
    }

    public function resetPasswordForm(Request $request)
    {
        return view('auth/resetPassword');
    }

    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required'
        ], [
            'required' => 'Completar campo'
        ]);

        $User = Customer::where('email', '=', $request["email"])->get(); //obtengo el email cuya contraseña se desea resetear

        if ($User->isEmpty()) { //verifico que el email ingresado exista
            return redirect('/resetPassword')->withErrors('El mail ingresado no se encuentra registrado.');
        }

        // genero una contraseña aleatoria
        $newPass = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(15 / strlen($x)))), 1, 15);
        $hash = password_hash($newPass, PASSWORD_DEFAULT);


        $User[0]->password = $hash;

        $User[0]->save();
        
        return view('auth/resetedPassword', compact('newPass'));
    }
}
