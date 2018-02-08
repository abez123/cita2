@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/createcita') }}">Cita</a> :
@endsection
@section("contentheader_description", "Crear Cita")
@section("section", "Citas")
@section("section_url", url(config('laraadmin.adminRoute') . '/createcita'))
@section("sub_section", "Crear")



@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				@la_access("Citas", "create")

			{!! Form::open(['action' => 'LA\CitasController@store', 'id' => 'cita-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                   
					
				
	<h4>Hola buen dia!</h4>
	<h4>Le atiende id->nombre en que le puedo ayudar</h4>
	<h5>¿En que sucursal le gustaría atenderse?</h5>
		<label class="control-label"  for="sucursal_id"><i class="glyphicon glyphicon-home"></i>  Sucursal *:</label> <select
							style="width: 100%" rel="select2" name="sucursal_id" id="sucursal_id"
							class="form-control select2"> 
							<option value=""></option>
                         
							@foreach($sucursales as $item)
							<option value="{{$item->id}}"
								@if(!empty($sucursales))
                                        @if($item->id==$sucursal)
								            selected="selected"
								        @endif
								@endif >{{$item->nombresuc}}</option>
							@endforeach
						</select>
                            <br>
					
						
						<label class="control-label"  for="servicio_id"><i class="glyphicon glyphicon-heart"></i> Servicio *:</label> <select
							style="width: 100%" rel="select2" name="servicio_id" id="servicio_id"
							class="form-control select2"> 
							<option value=""></option>
                         
							@foreach($servicios as $item)
							<option value="{{$item->id}}"
								@if(!empty($servicios))
                                        @if($item->id==$servicio)
								            selected="selected"
								        @endif
								@endif >{{$item->nombreservicio}}</option>
							@endforeach
						</select>
						
					
		        	<br>
	

						
			
						
					 <label class="control-label" for="pedicurista_id"> <i class="glyphicon glyphicon-user"></i>  Pedicurista</label>
                      <select style="width: 100%" name="pedicurista_id" id="pedicurista_id" class="form-control" rel="select2">
                       
                        
                      <option value=""></option>


                      </select>                                    
           
                    <br>
             	@la_input($module, 'fechaservicio')

                     <div class="form-group ">
                   <label class="control-label" for="hora"> <i class="glyphicon glyphicon-user"></i>  Horario</label>
                      <select style="width: 100%" name="hora" id="hora" class="form-control" rel="select2">
                       
                        
                  


                      </select>                                    
                   
                 
					
				</div>
				
			<label class="control-label"  for="cliente_id"> <i class="glyphicon glyphicon-user"></i> Cliente *:</label> <select
							style="width: 100%" rel="select2" name="cliente_id" id="cliente_id"
							class="form-control select2"> 
							<option value=""></option>
                          <option value="0">Nuevo Cliente</option>
							@foreach($clientes as $item)
							<option value="{{$item->id}}"
								@if(!empty($clientes))
                                        @if($item->id==$cliente)
								            selected="selected"
								        @endif
								@endif >{{$item->nombrecompleto}} | Celular: {{$item->celular}} | Tel casa: {{$item->telcasa}} | {{$item->correo}}</option>
							@endforeach
						</select>
					

			<div style="display: none" class="modal-header" id="newclient">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> <i class="glyphicon glyphicon-user"></i>  Nuevo Cliente</h4>
			</div>
			
			<div style="display: none" class="modal-body" id="newclientII">
				<div class="box-body">
                   
					<div class="form-group">
						<label>Nombre Completo: <input class="form-control" type="text" name="nombrecompleto" value="" id="nombrecompleto"></label>
					</div>
					<div class="form-group">
					<label>Telefono de Casa: <input class="form-control" type="tel" name="telcasa" value="" id="telcasa"></label>
					</div>
					<div class="form-group">
					<label>Celular: <input class="form-control" type="tel" name="celular" value="" id="celular"></label>
					</div>
					<div class="form-group">
					<label>Correo: <input class="form-control" type="email" name="correo" value="" id="correo"></label>
				</div>

					
					
				</div>
			</div>
			<br>
				@la_input($module, 'estatus')
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				{!! Form::submit( 'Crear', ['class'=>'btn btn-success']) !!}
			</div>
			{!! Form::close() !!}

@endla_access


@endsection

@push('scripts')

<script>



         
$(function () {
	$("#cita-add-form").validate({
		
	});
});
 $('#cliente_id').change(function(){
        if ($(this).val() == '0'){
           $('#newclient').show() &&  $('#newclientII').show();
        }
       
        else{


             $('#newclient').hide() &&  $('#newclientII').hide();
           }
    });

    $('#servicio_id').on('change', function(e){
    var cat_id = e.target.value; 
    var sucursal_id = $('#sucursal_id').val();
  
   
  

       //ajax

       $.get('{{url('/pedicurista-ajax')}}?sucursal_id=' + sucursal_id+'&servicio_id=' +  cat_id, function(data){

           //success data
           $('#pedicurista_id').empty();

           $('#pedicurista_id').append(' Seleccione Uno');
            
           $.each(data, function(index, subcatObj){

               $('#pedicurista_id').append('<option value ="todos">Cualquiera</option').append('<option value ="'
               + subcatObj.id +'">' + subcatObj.nombrecompleto  + '</option');
                 

           });
      
            $('#pedicurista_id').trigger('change');
            

       });


   });


 $('.input-group.date').on('dp.hide', function(e){
 
    var pedicurista_id  =  $('#pedicurista_id').val();
     var newfecha1=  $('#fechaservicio').val(); 
    var servicio_id = $('#servicio_id').val();
    
    // var timedisable=["10:00:00","12:00:00"]


   var newfecha = newfecha1.split("/").reverse().join("-");
       //ajax 

       $.get('{{url('/horario-ajax')}}?fechaservicio=' +newfecha+'&servicio_id=' + servicio_id+'&pedicurista_id=' + pedicurista_id, function(data){

           //success data
           $('#hora').empty();

           $('#hora').append(' Seleccione Uno');
            
           $.each(data, function(index, subcatObj){

               $('#hora').append('<option value ="'
               + subcatObj.hora +'">' + subcatObj.hora  + '</option');
             
				//for (index = 0; index < timedisable.length; ++index) {
				      // $("#hora option[value='"+timedisable[index]+"']").remove();
				//}
           });
     
            

       });


   });


</script>

@endpush
