@include('layouts.partials.htmlheader')

<body>
<div id="main-wrapper">
@include('layouts.partials.top_toolbar')  
@include('layouts.partials.navmenu')  
 

  <!-- SUB Banner -->
  <div class="profile-bnr sub-bnr user-profile-bnr">
    <div class="position-center-center">
      <div class="container">

        <h2>Reportes</h2>
      </div>
    </div>
  </div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box box-success">
      <h3><a href="{{url('user_profile#reporte')}}">Regresar</a></h3>
	<!--<div class="box-header"></div>-->
	<div class="box-body">
		<table id="example1" class="table table-bordered table-responsive table-striped">

		<thead>
		<tr class="success">
			@foreach( $listing_cols as $col )
			<th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
			@endforeach
			
		</tr>
		</thead>

		<tbody>
			
		</tbody>
		  
		</table>
	</div>
</div>
<br>
 <div class="col-md-6"> 
         <div class="sidebar">
        
                      
                   
                        <div class="media">
                   
                          <canvas  id="myChart" ></canvas>
         
                   </div>
                     
                        
                     
               
           
    </div>         
</div>
      <div class="col-md-6"> 
         <div class="sidebar">
        
                      
                   
                        <div class="media">
                   
                
                        
                        
                             <canvas   id="myChart2" ></canvas>
                   </div>
                     
                        
                     
               
           
    </div>         
</div>
<br>
     <div class="col-md-6"> 
         <div class="sidebar">
        
                      
                   
                        <div class="media">
                   
                          <canvas  id="myChart3" ></canvas>
         
                   </div>
                     
                        
                     
               
           
    </div>         
</div>
      <div class="col-md-6"> 
         <div class="sidebar">
        
                      
                   
                        <div class="media">
                   
                
                        
                        
                             <canvas  id="myChart4" ></canvas>
                   </div>
                     
                        
                     
               
           
    </div>         
</div>
   <br>
</div>

<!-- end #main-wrapper -->

@include('layouts.partials.footer')
@include('layouts.partials.scripts')

<script type="text/javascript">
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Asignadas", "Confirmadas", "Pagadas", "Canceladas", "No Show"],
        datasets: [{
            label: '# de Citas',
            data: [{{$citasasigandas}}, {{$citasconfirmadas}}, {{$citaspagadas}}, {{$citascancladas}},{{$citasnoshows}}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
              
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
               
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
var ctx2 = document.getElementById("myChart2");
var stackedLine = new Chart(ctx2, {
    type: 'line',
    data:  {"labels":
    ["Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio"],
    "datasets":
    [{"label":"Ventas x mes en miles",
    "data":
    [65000,59000,80000,81000,70000,65000,83000],
    "fill":true,
    "borderColor":"rgb(75, 192, 192)",
    "lineTension":0.1}]},
    "options":{}
  });

var ctx3 = document.getElementById("myChart3").getContext('2d');
var myPieChart = new Chart(ctx3,{
  "type":"doughnut",
  "data":
  {"labels":
  ["Red","Blue","Yellow"],
  "datasets":
  [{"label":"Clientes",
  "data":[300,50,100],
  "backgroundColor":["rgb(255, 99, 132)",
  "rgb(54, 162, 235)",
  "rgb(255, 205, 86)"]}
  ]}
});
var randomScalingFactor = function() {
      return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
    };

    var randomColorFactor = function() {
      return Math.round(Math.random() * 255);
    };
    var randomColor = function() {
      return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',.7)';
    };
    var config = {
      type: 'line',
      data: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio'],
        datasets: [{
          label: 'Servicios',
          fill: true,
          backgroundColor: "rgba(220,220,220,0.5)",
          borderColor: "rgba(220,220,220,0.5)",
          borderDash: [5, 5],
          data: [
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor()
          ],
        }, {
          label: 'Productos',
          fill: true,
          backgroundColor: "rgba(255,187,205,1)",
          borderColor: "rgba(255,187,205,1)",
          borderDash: [5, 5],
          data: [
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor()
          ],
        }, {
          label: 'Paquetes',
          backgroundColor: "rgba(151,187,205,0.5)",
          borderColor: "rgba(151,187,205,0.5)",
          borderDash: [5, 5],
          data: [
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor()
          ],
          fill: true,
        }]
      },
      options: {
        responsive: true,
        title: {
          display: true,
          text: 'Ventas por semestre'
        },
        tooltips: {
          mode: 'index',
          intersect: false,
        },
        hover: {
          mode: 'nearest',
          intersect: true
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Mes'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Pesos'
            }
          }]
        }
      }
    };
    window.onload = function() {
      var ctx4 = document.getElementById('myChart4').getContext('2d');
      window.myLine = new Chart(ctx4, config);
    };
  




  

</script>

<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>



<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
 <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
 <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>
<script>
$(function () {
	$("#example1").DataTable({

		dom: 'Bfrtip',
		buttons: [
          
            'excelHtml5',{
              extend: 'print',
               message: 'Autopartes Legazpi',
               exportOptions: {
                    columns: ':visible'
                },
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="http://todoparasuspies.com/includes/templates/tpsp.catalog/images/tpsp_logo_blue.svg" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                    }
                },
            {
                extend: 'pdfHtml5',
                
                message: 'Todo para Sus Pies',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                download: 'open', 
                exportOptions: { columns: ':visible' },
                 
            }
        
           
           
            
        ],
		processing: true,
        serverSide: true,
        ajax: "{{ url('/reporte_dt_ajax') }}",
		language: {
			"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
		autoWidth: false,
		scrollY: true,
        scrollX: true,
        scrollCollapse: true,
     
  
	});


});
</script>

