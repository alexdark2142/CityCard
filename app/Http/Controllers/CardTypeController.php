<?php

namespace App\Http\Controllers;

use App\Models\CardType;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class CardTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:card-type-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        $this->middleware('permission:card-type-create', ['only' => ['create','store']]);
        $this->middleware('permission:card-type-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:card-type-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $cardTypes = CardType::orderBy('id','DESC')->simplePaginate(5);

        return view('cardType.index',compact('cardTypes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cardType = CardType::all();

        return view('cardType.create',compact('cardType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        CardType::create([
            'name' => $request->get('name'),
            'cost_in_percent' => $request->get('cost_in_percent'),
        ]);

        return redirect('admin/card-types');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $cardType = CardType::findOrfail($id);

        return view('cardType.edit',compact('cardType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, $id)
    {
        CardType::findOrfail($id)->update([
            'name' => $request->get('name'),
            'cost_in_percent' => $request->get('cost_in_percent'),
        ]);

        return redirect('admin/card-types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy($id)
    {
        CardType::findOrfail($id)->delete();

        return redirect('admin/card-types');
    }
}
