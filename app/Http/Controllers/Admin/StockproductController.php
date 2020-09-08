<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Stockproduct;
use App\Category;

class StockproductController extends Controller
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
        return view('admin.stockproducts.index');
    }

    public function list(Request $request){

        $query = trim($request->get('searchText'));
        $val = explode(' ', $query );
        $atr = [];
        foreach ($val as $q) {
            array_push($atr, ['name', 'LIKE', '%'.strtolower($q).'%'] );
        };

        if($request->get('only_enabled') == 1){
            array_push($atr, ['enable', '=', 1]);
        }

        $cantidad = 5;
        if($request->has('cantidad')){
            $cantidad = $request->get('cantidad');
        }

        //dd($request->all());
        
        $stockproducts = Stockproduct::orderBy('name', 'ASC')
            ->where($atr)
            ->paginate($cantidad);
        
        return [
            'pagination' => [
                'total'         => $stockproducts->total(),
                'current_page'  => $stockproducts->currentPage(),
                'per_page'      => $stockproducts->perPage(),
                'last_page'     => $stockproducts->lastPage(),
                'from'          => $stockproducts->firstItem(),
                'to'            => $stockproducts->lastItem(),
            ],
            'items' => $stockproducts
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->get();

        return view('admin.stockproducts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->exists('web_enable')){
            $web_enable = 0;
        }else{
            $web_enable = 1;
        }

        if(!$request->exists('enable')){
            $enable = 0;
            $web_enable = 0;
        }else{
            $enable = 1;
        }

        $rules = [
            'name' => 'required|unique:categories,name',
            'category_id' => 'required',
        ];
        $messages = [
            'name.required' => 'El campo Nombre no puede quedar vacío.',
            'name.unique' => 'Existe un registro con el mismo nombre.',
            'category_id.required' => 'El campo Categoría no puede quedar vacío.',
        ];

        $validateData = $request->validate($rules, $messages);

        $stockproduct = new Stockproduct();
        $stockproduct->name = $validateData['name'];
        $stockproduct->category_id = $validateData['category_id'];
        $stockproduct->web_enable = $web_enable;
        $stockproduct->enable = $enable;
        $stockproduct->save();

        session()->flash('success', 'El Registro se ha creado satisfactoriamente.');

        return redirect()->route('stockproducts.edit', [$stockproduct->id]);
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
    public function edit(Stockproduct $stockproduct)
    {
        $categories = Category::orderBy('name', 'ASC')->get();

        return view('admin.stockproducts.edit', compact('stockproduct', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stockproduct $stockproduct)
    {
        if(!$request->exists('web_enable')){
            $web_enable = 0;
        }else{
            $web_enable = 1;
        }
        
        if(!$request->exists('enable')){
            $enable = 0;
            $web_enable = 0;
        }else{
            $enable = 1;
        }
        $rules = [
            'name' => 'required|unique:stockproducts,id,'.$stockproduct->id,
            'category_id' => 'required',
            'costo' => 'required',
        ];
        $messages = [
            'name.required' => 'El campo Nombre no puede quedar vacío.',
            'name.unique' => 'Existe un registro con el mismo nombre.',
            'category_id.required' => 'El campo Categoría no puede quedar vacío.',
            'costo.required' => 'El campo Costo no puede quedar vacío.',
        ];

        $validateData = $request->validate($rules, $messages);

        $stockproduct->name = $validateData['name'];
        $stockproduct->category_id = $validateData['category_id'];
        $stockproduct->web_enable = $web_enable;
        $stockproduct->enable = $enable;
        $stockproduct->costo = $validateData['costo'];
        $stockproduct->save();

        session()->flash('success', 'El Registro se ha actualizado satisfactoriamente.');

        return redirect()->route('stockproducts.edit', [$stockproduct->id]);
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
