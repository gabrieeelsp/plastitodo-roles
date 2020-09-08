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
                <h3 class="card-title" >Editar <b>CATEGORÍA</b></h3>
              </div>             
            </div>
            <!-- /.card-header -->
            <div class="card-body">

            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @method('PUT')
                @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label text-sm-right">Nombre</label> 
                        <div class="col-sm-8">                       
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                  name="name" value="{{ old('name', $category->name) }}" autocomplete="name">
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="rubro_id" class="col-sm-2 col-form-label text-sm-right">Rubro</label>
                      <div class="col-sm-8">
                        <select class="form-control @error('rubro_id') is-invalid @enderror" id="select" name="rubro_id">
                        <option value=""></option>
                          @foreach( $rubros as $rubro)
                            
                            <option value="{{ $rubro->id }}">{{ $rubro->name }}</option>
                          @endforeach
                        </select>
                        @error('rubro_id')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-10 offset-sm-2">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="web_enable" name="web_enable"
                            @if($category->web_enable)
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
                        <a href="{{ route('categories.index') }}" class="btn btn-info btn-sm"> Volver</a>
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
    $("select").val({{ $category->rubro_id }}).change();
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