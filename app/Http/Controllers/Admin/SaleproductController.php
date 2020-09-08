<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Saleproduct;
use App\Stockproduct;

class SaleproductController extends Controller
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
    public function index(Stockproduct $stockproduct)
    {
        return view('admin.saleproducts.index', compact('stockproduct'));
    }

    public function list(Request $request){

        //dd($request->all());

        $query = trim($request->get('searchText'));
        $val = explode(' ', $query );
        $atr = [];
        foreach ($val as $q) {
            array_push($atr, ['name', 'LIKE', '%'.strtolower($q).'%'] );
        };

        if($request->get('only_enabled') == 1){
            array_push($atr, ['enable', '=', 1]);
        }

        array_push($atr, ['stockproduct_id', '=', $request->get('stockproduct_id')]);

        $cantidad = 5;
        if($request->has('cantidad')){
            $cantidad = $request->get('cantidad');
        }

        //dd($request->all());
        
        $saleproducts = Saleproduct::orderBy('name', 'ASC')
            ->where($atr)
            ->paginate($cantidad);
        
        return [
            'pagination' => [
                'total'         => $saleproducts->total(),
                'current_page'  => $saleproducts->currentPage(),
                'per_page'      => $saleproducts->perPage(),
                'last_page'     => $saleproducts->lastPage(),
                'from'          => $saleproducts->firstItem(),
                'to'            => $saleproducts->lastItem(),
            ],
            'items' => $saleproducts
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Stockproduct $stockproduct)
    {
        return view('admin.saleproducts.create', compact('stockproduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Stockproduct $stockproduct, Request $request)
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
            'rel_stock_venta' => 'required',
        ];
        $messages = [
            'name.required' => 'El campo Nombre no puede quedar vacío.',
            'name.unique' => 'Existe un registro con el mismo nombre.',
            'rel_stock_venta.required' => 'El campo Rel Stock Venta no puede quedar vacío.',
        ];

        $validateData = $request->validate($rules, $messages);

        $saleproduct = new Saleproduct();
        $saleproduct->name = $validateData['name'];
        $saleproduct->web_enable = $web_enable;
        $saleproduct->enable = $enable;
        $saleproduct->rel_stock_venta = $validateData['rel_stock_venta'];
        $saleproduct->stockproduct_id = $stockproduct->id;
        $saleproduct->save();

        session()->flash('success', 'El Registro se ha creado satisfactoriamente.');

        return redirect()->route('stockproducts.saleproducts.edit', [$stockproduct->id, $saleproduct->id]);
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
    public function edit(Stockproduct $stockproduct, Saleproduct $saleproduct)
    {
        return view('admin.saleproducts.edit', compact('stockproduct', 'saleproduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stockproduct $stockproduct, Saleproduct $saleproduct)
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
            'name' => 'required|unique:saleproducts,id,'.$saleproduct->id,
            'rel_stock_venta' => 'required',
        ];
        $messages = [
            'name.required' => 'El campo Nombre no puede quedar vacío.',
            'name.unique' => 'Existe un registro con el mismo nombre.',
            'rel_stock_venta.required' => 'El campo Rel Stock Venta no puede quedar vacío.',
        ];

        $validateData = $request->validate($rules, $messages);

        $saleproduct->name = $validateData['name'];
        $saleproduct->web_enable = $web_enable;
        $saleproduct->enable = $enable;
        $saleproduct->rel_stock_venta = $validateData['rel_stock_venta'];
        $saleproduct->save();

        session()->flash('success', 'El Registro se ha actualizado satisfactoriamente.');

        return redirect()->route('stockproducts.saleproducts.edit', [$stockproduct->id, $saleproduct->id]);
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
