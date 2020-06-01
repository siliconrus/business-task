<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminMarkerRequest;
use App\Marker;

class MarkerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markers = Marker::orderBy('id', 'asc')
                         ->paginate(20);

        return view('admin.marker.index', compact('markers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\AdminMarkerRequest
     */
    public function create()
    {
        return view('admin.marker.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AdminMarkerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminMarkerRequest $request)
    {
        Marker::create([
            'lat' => $request->lat,
            'lng' => $request->lng
        ]);

        return redirect()->route('markers.store')->with('success', 'Создан новый маркер');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $markers = Marker::find($id);

        return view('admin.marker.form', compact('markers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\AdminMarkerRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminMarkerRequest $request, int $id)
    {
   /*     $request->user()->update([
            'lat' => $request->input('lat'),
            'lng' => $request->input('lng')
        ]);*/

        $markers = Marker::find($id);

        $markers->lat = $request->input('lat');
        $markers->lng = $request->input('lng');

        $markers->save();
        return redirect()->route('markers.store')->with('success', 'Вы обновили маркер');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Marker::destroy($id);

        return redirect()->route('markers.store')->withErrors(['current' => 'Маркер удален!']);
    }
}
