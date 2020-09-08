<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Rubro;
use App\Category;

class CategoryController extends Controller
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
        return view('admin.categories.index');
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
        
        $categories = Category::orderBy('name', 'ASC')
            ->where($atr)
            ->paginate($cantidad);
        
        return [
            'pagination' => [
                'total'         => $categories->total(),
                'current_page'  => $categories->currentPage(),
                'per_page'      => $categories->perPage(),
                'last_page'     => $categories->lastPage(),
                'from'          => $categories->firstItem(),
                'to'            => $categories->lastItem(),
            ],
            'items' => $categories
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rubros = Rubro::orderBy('name', 'ASC')->get();

        return view('admin.categories.create', compact('rubros'));
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
        //dd($request->all());
        $rules = [
            'name' => 'required|unique:categories,name',
            'rubro_id' => 'required',
        ];
        $messages = [
            'name.required' => 'El campo Nombre no puede quedar vacío.',
            'name.unique' => 'Existe un registro con el mismo nombre.',
            'rubro_id.required' => 'El campo Rubro no puede quedar vacío.',
        ];

        $validateData = $request->validate($rules, $messages);

        $category = new Category();
        $category->name = $validateData['name'];
        $category->rubro_id = $validateData['rubro_id'];
        $category->web_enable = $web_enable;
        $category->save();

        session()->flash('success', 'El Registro se ha creado satisfactoriamente.');

        return redirect()->route('categories.edit', [$category->id]);
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
    public function edit(Category $category)
    {
        $rubros = Rubro::orderBy('name', 'ASC')->get();

        return view('admin.categories.edit', compact('category', 'rubros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if(!$request->exists('web_enable')){
            $web_enable = 0;
        }else{
            $web_enable = 1;
        }
        //dd($request->all());
        $rules = [
            'name' => 'required|unique:categories,id,'.$category->id,
            'rubro_id' => 'required',
        ];
        $messages = [
            'name.required' => 'El campo Nombre no puede quedar vacío.',
            'name.unique' => 'Existe un registro con el mismo nombre.',
            'rubro_id.required' => 'El campo Rubro no puede quedar vacío.',
        ];

        $validateData = $request->validate($rules, $messages);
        //dd($validateData);
        $category->name = $validateData['name'];
        $category->rubro_id = $validateData['rubro_id'];
        $category->web_enable = $web_enable;
        //dd($category);
        $category->save();

        session()->flash('success', 'El Registro se ha actualizado satisfactoriamente.');

        return redirect()->route('categories.edit', [$category->id]);
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
