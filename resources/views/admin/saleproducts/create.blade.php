@extends('layouts.starter')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div id="app" class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          
        </div><!-- /.col -->
        
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- Main row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header table-title">
              <div class=" d-flex justify-content-between align-items-center">
                <h3 class="card-title" >Nuevo <b>PRODUCTO VENTA</b></h3>
                
              </div>
              
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <form action="{{ route('stockproducts.saleproducts.store', $stockproduct->id) }}" method="POST">
                @csrf
                    <div class="form-group row">
                        <label for="name_ps" class="col-sm-2 col-form-label text-sm-right">Producto Stock</label> 
                        <div class="col-sm-8">                       
                          <input id="name_ps" type="text" class="form-control @error('name_ps') is-invalid @enderror" disabled 
                                  name="name_ps" value="{{ old('name_ps', $stockproduct->name) }}" autocomplete="name_ps">
                          @error('name_ps')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label text-sm-right">Nombre</label> 
                        <div class="col-sm-8">                       
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                  name="name" value="{{ old('name') }}" autocomplete="name">
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="rel_stock_venta" class="col-sm-2 col-form-label text-sm-right">Rel Stock Venta</label> 
                        <div class="col-sm-4 col-lg-3 col-xl-2">                       
                          <input id="rel_stock_venta" type="number" class=" text-right form-control @error('rel_stock_venta') is-invalid @enderror" 
                                  name="rel_stock_venta" value="{{ old('rel_stock_venta') }}" autocomplete="rel_stock_venta" step="any">
                          @error('rel_stock_venta')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-10 offset-sm-2">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="enable" name="enable"
                            
                          >
                          <label class="form-check-label" for="enable">Habilitado</label>
                        </div>
                      </div>
                    </div>
                
                    
                    <div class="form-group row">
                      <div class="col-sm-10 offset-sm-2">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="web_enable" name="web_enable">
                          <label class="form-check-label" for="web_enable">Vista WEB</label>
                        </div>
                      </div>
                    </div>

                    
                    
                    <div class="form-group row">
                      <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                        <a href="{{ route('stockproducts.saleproducts.index', $stockproduct->id) }}" class="btn btn-info btn-sm"> Volver</a>
                      </div>
                    </div>
                </form>
                
            </div>
            <!-- /.card-body -->
            
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection