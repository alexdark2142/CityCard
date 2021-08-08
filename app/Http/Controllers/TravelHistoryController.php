<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\TravelHistory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class TravelHistoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index($id)
    {
        $travelHistories = TravelHistory::with('route')->whereCardId($id)->orderBy('id','DESC')->simplePaginate(5);
        $number = Card::findOrfail($id)->number;

        return view('travelHistory.index',compact('travelHistories', 'number'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
