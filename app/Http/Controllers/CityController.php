<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:city-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        $this->middleware('permission:city-create', ['only' => ['create','store']]);
        $this->middleware('permission:city-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:city-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $cities = City::orderBy('id','DESC')->simplePaginate(5);

        return view('city.index',compact('cities'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();

        return view('city.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        City::create(['name' => $request->get('name')]);

        return redirect('admin/cities');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $city = City::findOrfail($id);

        return view('city.edit',compact('city'));
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
        City::findOrfail($id)->update($request->all());

        return redirect('admin/cities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy($id)
    {
        City::findOrfail($id)->delete();

        return redirect('admin/cities');
    }
}
