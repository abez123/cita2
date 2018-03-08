@include('layouts.partials.htmlheader')

<body>
  
<div id="main-wrapper"> 
  
  @include('layouts.partials.top_toolbar')  
@include('layouts.partials.navmenu')  
  <!-- HOME PRO-->
  <div class="home-pro"> 
    
    <!-- PRO BANNER HEAD -->
    <div class="banr-head">
      <div class="container">
        <div class="row"> 
          
          <!-- CONTENT -->
          <div class="col-sm-7">
            <div class="text-area">
              <div class="position-center-center col-md-10">
                <h1> Plataforma Todo Para Sus Pies Franquiciatario</h1><a href="whatsapp://send?text=Hello World!&phone=+523316108875">Ping me on WhatsApp</a>
                <h6>Tu plataforma para compartir, informar y recibir noticias de parte del corporativo Todo Para Sus Pies </h6>
              </div>
            </div>
          </div>
          
          <!-- FORM SECTION -->
          <div class="col-sm-5">
            <div class="login-sec"> 
              
              <!-- TABS -->
              <div class="uou-tabs">
                <ul class="tabs">
                 
                  <li class="active"><a href="#log-in">Ingreso Franquiciatario</a></li>
                </ul>
                
           
                  
                  <!-- LOGIN -->
                  <div id="log-in" class="active">
                    @if (Auth::guest())
                    <form action="{{ url('/login') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="email" name="email" placeholder="Email Address">
                      <input type="password" name="password" placeholder="Password">
                      <button type="submit">Ingresar</button>
                     
                      <div class="forget">¿Olvidó su contraseña? <a href="{{ url('/password/reset') }}">Entra aqui</a></div>
                      
                    </form>
                  @elseif(\Entrust::hasRole('FRANQUICIATARIO'))
                <li><a href="{{ url('user_profile') }}">{{ Auth::user()->name }}</a></li>
                 
                        <li><a href="{{ url('/logout') }}">Salir</a></li></ul>
                  @elseif(\Entrust::hasRole('FRANQUICIATARIO_ADMIN'))
             <li><a href="{{ url(config('laraadmin.adminRoute')) }}">Admin</a></li>

              <li><a href="{{ url('user_profile') }}"> {{ Auth::user()->name }} </a></li>
                   <li><a href="{{ url('/logout') }}">Salir</a></li></ul>
               @else
            <li><a href="{{ url(config('laraadmin.adminRoute')) }}">{{ Auth::user()->name }}</a></li>
                       <li><a href="{{ url('/logout') }}">Salir</a></li></ul>  
                @endif
             
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- SERVICES -->
    <section class="services"> 
      
      <!-- SERVICES ROW -->
      <ul class="row">
        
        <!-- SECTION -->
        <li class="col-md-4">
          <div class="ser-inn">
          <i class="fa fa-globe"></i>
            <h4>Mantente informado</h4>
            <i class="fa fa-globe big"></i>
            <p>La pataforma de Todo Para Sus Pies Franquiciatario es un lugar para estar informado y poder comunicarte facilemte con el corporativo</p>
          </div>
        </li>
        
        <!-- SECTION -->
        <li class="col-md-4">
          <div class="ser-inn">
            <i class="fa fa-book"></i>
            <h4>Puedes obtener las últimas noticias para tu franquicia</h4>
            <i class="fa fa-book big"></i>
            <p>Copartimos constantemente noticias para la mejora continua</p>
          </div>
        </li>
        
        <!-- SECTION  -->
        <li class="col-md-4">
          <div class="ser-inn">
          <i class="fa fa-picture-o"></i>
            <h4>Comparte información con nostros</h4>
            <i class="fa fa-picture-o big"></i>
            <p>Nos puedes enviar mensaje, chat o subir archivos para compartir</p>
          </div>
        </li>
      </ul>
    </section>
    
    <!-- PRO SECTION -->
    <section class="pro-content">
      <div class="container-fluid">
        <div class="row"> 
          
          <!-- PRO IMAGE -->
          <div class="col-md-6 pro-inside" style="background:url(../public/socio-assets/images/pro-img-1.jpg) center center no-repeat;"></div>
          
          <!-- PRO CONTENT -->
          <div class="col-md-6 pro-inside">
            <div class="position-center-center col-md-6">
              <h1>Reportes Especializados</h1>
              <p> Reportes para tomar decisiones importantes. Reportes de ventas por semana, mes y año. Tambíen por pedicurista y sucursales </p>
            </div>
          </div>
        </div>
      </div>
      
      <!-- PRO SECTION -->
      <div class="container-fluid">
        <div class="row"> 
          
          <!-- PRO TEXT -->
          <div class="col-md-6 pro-inside">
            <div class="position-center-center col-md-6">
              <h1>Recibe Notificaciones Importantes</h1>
              <p> Les enviamos noticas importantes parala mejora continua de su frnaquicia Todo Para Sus Pies </p>
            </div>
          </div>
          
          <!-- PRO BACKGROUND -->
          <div class="col-md-6 pro-inside" style="background:url(../public/socio-assets/images/pro-img-2.jpg) center center no-repeat;"></div>
        </div>
      </div>
    </section>
    
    <!-- APP IMAGE -->
    <section class="app-images">
      <div class="container">
        <div class="row"> 
          
          <!-- TEXT -->
          <div class="col-md-6 text-center text-area">
            <h1>Se adapta a su Smartphone</h1>
            <p>La plataforma se adapta a cualquier dispositivo.</p>
            </div>
          
          <!-- APP IMAGE -->
          <div class="col-md-6 text-right"><img src="../public/socio-assets/images/app-img.png" alt="" > </div>
        </div>
      </div>
    </section>
    
    <!-- TESTIMONIALS -->
    <section class="clients-says">
      <div class="container">
        <h3 class="section-title">que dicen nuestros franquiciatarios </h3>
        <div class="testi">
          <div class="texti-slide"> 
            <!-- SLide -->
            <div class="clints-text">
              <div class="text-in">
                <p>Es una manera de poder estar informado de los más importante para mi franquicia</p>
              </div>
              <div class="avatar">
                <div class="media-left"> <a href="#."> <img src="../public/socio-assets/images/clients-avatar-1.jpg" alt=""> </a> </div>
                <div class="media-body">
                  <h6>Ignacio GP</h6>
               </div>
              </div>
            </div>
            
            <!-- SLide -->
            <div class="clints-text">
              <div class="text-in">
                <p>Puede organizar mi franquicia de una manera mucha más efectiva. Muchas Gracias</p>
              </div>
              <div class="avatar">
                <div class="media-left"> <a href="#."> <img src="../public/socio-assets/images/clients-avatar-1.jpg" alt=""> </a> </div>
                <div class="media-body">
                  <h6>Omar Garcia P</h6>
                </div>
              </div>
            </div>
            

          </div>
        </div>
      </div>
    </section>
    
    <!-- sponsors -->
    <div class="sponsors" style="background:url(../public/socio-assets/images/sponser-bg.jpg) no-repeat;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="section-title">Franquicias Destacadas</h3>
            <div class="sponsors-slider">
              <div class="item"><img src="../public/socio-assets/images/sponsor_logo1.png" alt="" class="img-responsive"></div>
              <div class="item"><img src="../public/socio-assets/images/sponsor_logo2.png" alt="" class="img-responsive"></div>
              <div class="item"><img src="../public/socio-assets/images/sponsor_logo3.png" alt="" class="img-responsive"></div>
              <div class="item"><img src="../public/socio-assets/images/sponsor_logo4.png" alt="" class="img-responsive"></div>
              <div class="item"><img src="../public/socio-assets/images/sponsor_logo5.png" alt="" class="img-responsive"></div>
              <div class="item"><img src="../public/socio-assets/images/sponsor_logo6.png" alt="" class="img-responsive"></div>
              <div class="item"><img src="../public/socio-assets/images/sponsor_logo4.png" alt="" class="img-responsive"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('layouts.partials.footer')
@include('layouts.partials.scripts')
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a9860554b401e45400d54b2/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>


</html>