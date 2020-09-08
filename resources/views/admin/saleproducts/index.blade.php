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
          <div class="card card-table">
          <div class="card-header table-title">
              <div class=" d-flex justify-content-between align-items-center">
                <h3 class="card-title" >Gestión <b>PRODUCTOS VENTA</b></h3>
                <a href="{{ route('stockproducts.saleproducts.create', $stockproduct->id) }}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Nuevo</a>
              </div>
              
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-filter">
              <div class="row mb-3">
                <div class="col-12 col-sm-2 col-lg-4 col-xl-6">
                
                </div>

                <div class="col-12 col-sm-4 col-lg-3 col-xl-3 d-flex align-items-center justify-content-end">
                  <div class="form-check ">
                    <input type="checkbox" class="form-check-input" v-model="only_enabled" @change="getItems(1)" id="web_enable" name="web_enable">
                    <label class="form-check-label" for="web_enable">Solo HABILITADOS</label>
                  </div>
                </div>
                
                <div class="col-12 col-sm-6 col-lg-5 col-xl-3 d-flex align-items-center justify-content-end">
                    <span class="mr-2">Buscar</span>
                    <input type="text" class="form-control form-control-sm" v-model="searchText" @keyup="getItems(1)">
                </div>
              </div>
              </div>
              <table class="table table-bordered table-striped table-hover border-top">
                <thead>
                  <tr>
                    <th width="10px">ID</th>
                    <th>Nombre</th>
                    <th>HABILITADO</th>
                    <th>Web</th>
                    <th >Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="saleproduct in items">
                    <td>@{{ saleproduct.id }}</td>
                    <td>@{{ saleproduct.name }}</td>
                    <td width="10px"> 
                      <span v-show="saleproduct.enable" class="badge bg-success">enable</span>
                      <span v-show="!saleproduct.enable" class="badge bg-red">disable</span>
                    </td>
                    <td width="10px"> 
                      <span v-show="saleproduct.web_enable" class="badge bg-success">enable</span>
                      <span v-show="!saleproduct.web_enable" class="badge bg-red">disable</span>
                    </td>
                    <td width="10px">
                      <div class="d-flex justify-content-around">
                        <a :href="'/admin/stockproducts/'+ stockproduct_id +'/saleproducts/' + saleproduct.id + '/edit'" class="text-warning"><i class="fas fa-edit"></i></a>
                        
                        <a href="#" class="text-danger"><i class="fas fa-trash"></i></i></a>
                      </div>
                    </td>
                  </tr>
                  
                  
                </tbody>    

              </table>
              <nav class="pagination-nav mt-3 d-flex justify-content-end align-items-center">
                    <div class="show-entries">
                      <span class="mr-2">Mostrar</span>
                      <select v-model="cantidad_entradas" @change="getItems()">
                        <option>5</option>
                        <option>10</option>
                        <option>20</option>
                      </select>
                      <span class="mr-3">entradas</span>
                    </div>
                
                    <ul class="pagination mb-0">
                        <li class="page-item"  v-bind:class="[ pagination.current_page > 1 ? '' : 'disabled']">
                            <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page - 1)">
                                <span>Atras</span>
                            </a>
                        </li>

                        <li class="page-item" v-for="page in pagesNumber" v-bind:class="[ page == isActive ? 'active' : '']">
                            <a class="page-link" href="#" @click.prevent="changePage(page)">
                                @{{ page }}
                            </a>
                        </li>
                        <li class="page-item"  v-bind:class="[ pagination.current_page < pagination.last_page? '' : 'disabled']">

                        <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page + 1)">
                                <span>Siguiente</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                

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
<script>
  new Vue({
    el: '#app',
    created: function() {
      this.cantidad_entradas = 5;
      this.getItems();       
    },
    data: {
        items: [],
        pagination: {
            'total'         : 0,
            'current_page'  : 0,
            'per_page'      : 0,
            'last_page'     : 0,
            'from'          : 0,
            'to'            : 0
        },
        item: '',
        errors: [],
        offset: 3,
        searchText:'',
        cantidad_entradas: '',
        only_enabled:'true',
        stockproduct_id: {{ $stockproduct->id }},
        

    },
    computed: {

        isActive: function() {
            return this.pagination.current_page;
        },
        pagesNumber: function() {
            if(!this.pagination.to){
                return [];
            }
            var from = this.pagination.current_page - this.offset 
            if(from < 1){
                from = 1;
            }

            var to = from + ( this.offset * 2 ); 
            if(to > this.pagination.last_page){
                to = this.pagination.last_page;
            }

            var pageArray = [];
            while( from <= to ){
                pageArray.push(from);
                from ++;
            }
            return pageArray;
        }
    },
    methods: {
        getItems: function(page){
          var only_enabled = 0;
          if(this.only_enabled){
            only_enabled = 1;
          }else{
            only_enabled = 0;
          }
            
            var urlItems = '/admin/saleproducts/list?page=' + page + '&searchText=' + this.searchText + '&cantidad=' + this.cantidad_entradas + '&only_enabled=' + only_enabled + '&stockproduct_id=' + this.stockproduct_id;
            axios.get(urlItems).then(response => {

                this.items = response.data.items.data;
                
                this.pagination = response.data.pagination;
            });
        },

        changePage: function(page) {
            this.pagination.current_page = page;
            this.getItems(page);
        },

        
        
    }
});
</script>
@endpush
@endsection