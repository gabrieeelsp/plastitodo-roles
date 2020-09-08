<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Rubro;

class RubroController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        return view('admin.rubros.index');
    }

    public function list(Request $request){
        $query = trim($request->get('searchText'));
        $val = explode(' ', $query );
        $atr = [];
        foreach ($val as $q) {
            array_push($atr, ['name', 'LIKE', '%'.strtolower($q).'%'] );
        };

        $cantidad = 10;
        if($request->has('cantidad')){
            $cantidad = $request->get('cantidad');
        }
        
        $rubros = Rubro::orderBy('name', 'ASC')
            ->where($atr)
            ->paginate($cantidad);
        
        return [
            'pagination' => [
                'total'         => $rubros->total(),
                'current_page'  => $rubros->currentPage(),
                'per_page'      => $rubros->perPage(),
                'last_page'     => $rubros->lastPage(),
                'from'          => $rubros->firstItem(),
                'to'            => $rubros->lastItem(),
            ],
            'items' => $rubros
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rubros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $rules = [
            'name' => 'required|unique:rubros,name',
        ];
        $messages = [
            'name.required' => 'El campo Nombre no puede quedar vacío.',
            'name.unique' => 'Existe un Rubro con el mismo nombre.',
        ];

        $validateData = $request->validate($rules, $messages);

        $rubro = new Rubro();
        $rubro->name = $validateData['name'];
        $rubro->save();

        session()->flash('success', 'El Registro se ha creado satisfactoriamente.');

        return redirect()->route('rubros.edit', [$rubro->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rubro $rubro)
    {
        return view('admin.rubros/edit', compact('rubro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rubro $rubro)
    {
        $rules = [
            'name' => 'required|unique:rubros,id,'.$rubro->id,
        ];
        $messages = [
            'name.required' => 'El campo Nombre no puede quedar vacío.',
            'name.unique' => 'Existe un Rubro con el mismo nombre.',
        ];

        $validateData = $request->validate($rules, $messages);

        $rubro->name = $validateData['name'];
        $rubro->save();

        session()->flash('success', 'El Registro se ha actualizado satisfactoriamente.');

        return redirect()->route('rubros.edit', $rubro->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
