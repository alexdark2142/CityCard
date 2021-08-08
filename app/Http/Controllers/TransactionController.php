<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class TransactionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index($id)
    {
        $transactions = Transaction::orderBy('id','DESC')->simplePaginate(5);
        $number = Card::findOrfail($id)->number;

        return view('transaction.index',compact('transactions', 'number'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
