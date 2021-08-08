<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\City;
use App\Models\CardType;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index($userId)
    {
        $cards = Card::with('city', 'cardType')->whereUserId($userId)->orderBy('id','DESC')->simplePaginate(5);

        return view('card.index',compact('cards'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $cardTypes = CardType::all();
        $cities = City::all();

        return view('card.create',compact('cardTypes', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param $userId
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request, $userId)
    {
        Card::create([
            'user_id' => $userId,
            'number' => rand(111111, 999999),
            'city_id' => $request->get('city'),
            'card_type_id' => $request->get('type'),
        ]);

        return redirect(Auth::id() . '/cards');
    }
}
