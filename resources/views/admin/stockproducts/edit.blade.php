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
                <h3 class="card-title" >Editar <b>PRODUCTO STOCK</b></h3>
                <a href="{{ route('stockproducts.saleproducts.index', $stockproduct->id) }}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Productos VENTA</a>
              </div>             
            </div>
            <!-- /.card-header -->
            <div class="card-body">

            <form action="{{ route('stockproducts.update', $stockproduct->id) }}" method="POST">
                @method('PUT')
                @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label text-sm-right">Nombre</label> 
                        <div class="col-sm-8">                       
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                  name="name" value="{{ old('name', $stockproduct->name) }}" autocomplete="name">
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="category_id" class="col-sm-2 col-form-label text-sm-right">Categoría</label>
                      <div class="col-sm-8">
                        <select class="form-control @error('category_id') is-invalid @enderror" id="select" name="category_id">
                        <option value=""></option>
                          @foreach( $categories as $category)
                            
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                        @error('category_id')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div>


                    
                    <div class="form-group row">
                        <label for="costo" class="col-sm-2 col-form-label text-sm-right">Costo</label> 
                        <div class="col-sm-4 col-lg-3 col-xl-2">                       
                          <input id="costo" type="number" class=" text-right form-control @error('costo') is-invalid @enderror" 
                                  name="costo" value="{{ old('costo', $stockproduct->costo) }}" autocomplete="costo" step="any">
                          @error('costo')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stock" class="col-sm-2 col-form-label text-sm-right">Stock</label> 
                        <div class="col-sm-4 col-lg-3 col-xl-2">                      
                          <input id="stock" type="number" class="text-right form-control @error('stock') is-invalid @enderror" disabled
                                  name="stock" value="{{ old('stock', $stockproduct->stock) }}" autocomplete="stock" step="any">
                          @error('stock')
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
                            @if($stockproduct->enable)
                              checked
                            @endif
                          >
                          <label class="form-check-label" for="enable">Habilitado</label>
                        </div>
                      </div>
                    </div>


                    <div class="form-group row">
                      <div class="col-sm-10 offset-sm-2">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="web_enable" name="web_enable"
                            @if($stockproduct->web_enable)
                              checked
                            @endif
                          >
                          <label class="form-check-label" for="web_enable">Vista WEB</label>
                        </div>
                      </div>
                    </div>

                    
                    
                    <div class="form-group row">
                      <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                        <a href="{{ route('stockproducts.index') }}" class="btn btn-info btn-sm"> Volver</a>
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

@push('scripts')

<script src="/{{ env('URL_REMOTE', '') }}vendor/select2/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function(){
    $("select").select2({

    });
    $("select").val({{ $stockproduct->category_id }}).change();
  })
</script>

<script>
  @if (session()->get('success'))

    toastr.success("{{ session()->get('success')  }}");     
  @endif
  @if (session()->get('info'))

    toastr.info("{{ session()->get('info')  }}");     
  @endif

</script>
@endpush
@endsection