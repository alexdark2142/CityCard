<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:transport-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        $this->middleware('permission:transport-create', ['only' => ['create','store']]);
        $this->middleware('permission:transport-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:transport-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $transports = Transport::orderBy('id','DESC')->simplePaginate(5);

        return view('transport.index',compact('transports'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transports = Transport::all();

        return view('transport.create',compact('transports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        Transport::create($request->all());

        return redirect('admin/transports');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $transport = Transport::findOrfail($id);

        return view('transport.edit',compact('transport'));
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
        Transport::findOrfail($id)->update([
            'type' => $request->get('type'),
            'tariff' => $request->get('tariff')
        ]);

        return redirect('admin/transports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy($id)
    {
        Transport::findOrfail($id)->delete();

        return redirect('admin/transports');
    }
}
