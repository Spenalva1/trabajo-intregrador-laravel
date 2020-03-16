<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Mark;
use App\Cart;
use App\Receipt;
use App\ReceiptProduct;
use Illuminate\Support\Facades\Auth;

class ReceiptsController extends Controller
{
    public function index()
    {
        $Receipts = Receipt::all();

        foreach ($Receipts as $Receipt) {
            $Receipt->total = 0;
            foreach ($Receipt->products as $Product) {
                $Receipt->total += $Product->price * $Product->pivot->quantity;
            }
        }

        return view('adminSales', compact('Receipts'));
    }

    public function indexForUser()
    {
        $User = Auth::user();
        if ($User == null) { //verifico que haya un usuario logeado
            return redirect('/login');
        }

        $Receipts = Receipt::where('user_id', '=', $User->id)->get();
        $Receipts = $Receipts->sortByDesc('date');
        foreach ($Receipts as $Receipt) {
            $Receipt->total = 0;
            foreach ($Receipt->products as $Product) {
                $Receipt->total += $Product->price * $Product->pivot->quantity;
            }
        }

        return view('purchases', compact('Receipts'));
    }
}
