@include('layouts.partials.htmlheader')

<body>
<div id="main-wrapper"> 
  
  <!-- Top Toolbar -->
 @include('layouts.partials.top_toolbar')  
  <!-- end toolbar -->
  
 @include('layouts.partials.navmenu')  
  <div class="compny-profile"> 
    <!-- SUB Banner -->
    <div class="profile-bnr user-profile-bnr">
      <div class="container">
        <div class="pull-left">
          @foreach($franquiciatarios as $franquiciatario)
          <h2>{{$franquiciatario->nombrecompletofran}}</h2>
          <h5>{{$franquiciatario->correofran}}</h5>
          @endforeach
        </div>
        
        <!-- Top Riht Button -->
        <div class="right-top-bnr">
          <div class="connect"> <a href="#." data-toggle="modal" data-target="#myModal"><i class="fa fa-user-plus"></i> Connect</a> <a href="#."><i class="fa fa-share-alt"></i> Share</a>
            <div class="bt-ns"> <a href="#."><i class="fa fa-bookmark-o"></i> </a> <a href="#."><i class="fa fa-envelope-o"></i> </a> <a href="#."><i class="fa fa-exclamation"></i> </a> </div>
          </div>
        </div>
      </div>
      
      <!-- Modal POPUP -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="container">
              <h6><a class="close" href="#." data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a> Send Message</h6>
              
              <!-- Forms -->
              <form action="#">
                <ul class="row">
                  <li class="col-xs-6">
                    <input type="text" placeholder="First Name ">
                  </li>
                  <li class="col-xs-6">
                    <input type="text" placeholder="Last Name">
                  </li>
                  <li class="col-xs-6">
                    <input type="text" placeholder="Country">
                  </li>
                  <li class="col-xs-6">
                    <input type="text" placeholder="Email">
                  </li>
                  <li class="col-xs-12">
                    <textarea placeholder="Your Message"></textarea>
                  </li>
                  <li class="col-xs-12">
                    <button class="btn btn-primary">Send message</button>
                  </li>
                </ul>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Profile Company Content -->
    <div class="profile-company-content user-profile main-user" data-bg-color="f5f5f5">
      <div class="container">
        <div class="row"> 
          
          <!-- Nav Tabs -->
          <div class="col-md-12">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#profile">Perfil</a></li>
              <li><a data-toggle="tab" href="#factura">Facturas</a> </li>
           
             
                  <li><a data-toggle="tab" href="#citas">Citas</a></li>
                  <li><a data-toggle="tab" href="#blog-tab">Noticias</a></li>
                  <li><a data-toggle="tab" href="#estado">Estado de cuenta</a></li>
               <li><a data-toggle="tab" href="#docus">Documentos</a></li>
              <li><a data-toggle="tab" href="#contacto">Contacto</a></li>
              <li><a data-toggle="tab" href="#tareas">Tareas</a></li>         
             
              <li><a data-toggle="tab" href="#encuesta">Encuestas</a></li>
             
            </ul>
          </div>
          
          <!-- Tab Content -->
          <div class="col-md-12">
            <div class="tab-content"> 
                
              <!-- PROFILE -->
              <div id="profile" class="tab-pane fade in active">
                <div class="row">
                  <div class="col-md-12">
                    <div class="profile-main">
                      <h3>About</h3>
                      <div class="profile-in">
                        <div class="media-left">
                          @foreach($franquiciatarios as $franquiciatario)
                   <?php $imgs = \App\Models\Upload::find($franquiciatario->imagenfran); ?>
                          <div class="img-profile"> <img class="media-object" src="{{$imgs->path()}}" alt=""> </div>
                          @endforeach
                        </div>
                        <div class="media-body">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, maxime, excepturi, mollitia, voluptatibus similique aliquidautem 
                            laudantium sapiente ad enim ipsa modi labo rum accusantium deleniti neque architecto vitae.<br>
                            <br>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, nihil, dolores, culpa ullam vero ipsum placeat accusamus nemo
                            itate id molestiae consectetur quae pariatur repudi andae vel ex quaerat nam iusto aliquid laborum quia adipisci aut ut imcati 
                            nisi deleniti tempore maxime sequi fugit reiciendis libero quo. Rerum, assumenda. <br>
                            <br>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem, at nemo inventore temporibus corporis suscipit.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8"> 
                    
                    <!-- Skills -->
                    <div class="sidebar">
                      <h5 class="main-title">Skills</h5>
                      <div class="job-skills"> 
                        
                        <!-- Logo Design -->
                        <ul class="row">
                          <li class="col-sm-3">
                            <h6><i class="fa fa-plus"></i> HTML5 and Css3</h6>
                          </li>
                          <li class="col-sm-9">
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"> </div>
                            </div>
                          </li>
                        </ul>
                        
                        <!-- Logo Design -->
                        <ul class="row">
                          <li class="col-sm-3">
                            <h6><i class="fa fa-plus"></i> Logo Design</h6>
                          </li>
                          <li class="col-sm-9">
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"> </div>
                            </div>
                          </li>
                        </ul>
                        
                        <!-- Logo Design -->
                        <ul class="row">
                          <li class="col-sm-3">
                            <h6><i class="fa fa-plus"></i> Web Design</h6>
                          </li>
                          <li class="col-sm-9">
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"> </div>
                            </div>
                          </li>
                        </ul>
                        
                        <!-- UI / UX -->
                        <ul class="row">
                          <li class="col-sm-3">
                            <h6><i class="fa fa-plus"></i> UI/UX</h6>
                          </li>
                          <li class="col-sm-9">
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"> </div>
                            </div>
                            <p>Preferred languages are Arabic, French & Italian. Proin nibh augue, suscipit asce lerisque sed, lacinia in, mi.</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                    
                    <!-- Professional Details -->
                    <div class="sidebar">
                      <h5 class="main-title">Similar Professionals</h5>
                      
                      <!-- Similar -->
                      <div class="similar">
                        <div class="media">
                          <div class="media-left">
                            <div class="inn-simi"> <img class="media-object" src="../public/socio-assets/images/med-avatar.jpg" alt=""> <a href="#">Profile </a> </div>
                          </div>
                          <div class="media-body">
                            <h5>Media heading</h5>
                            <p>SEO Specialist - New York, USA</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, maxime, excepturi, mollitia, 
                              voluptatibus similique aliquid a dolores autem laudantium sapiente ad enim ipsa modi laborum 
                              accusantium deleniti neque architecto vitae.</p>
                            
                            <!-- Share -->
                            <div class="share-w"><a href="#."><i class="fa fa-bookmark-o"></i></a> <a href="#."><i class="fa fa-envelope-o"></i></a> <a href="#."><i class="fa fa-eye"></i></a></div>
                          </div>
                        </div>
                        
                        <!-- Similar -->
                        <div class="media">
                          <div class="media-left">
                            <div class="inn-simi"> <img class="media-object" src="../public/socio-assets/images/med-avatar.jpg" alt=""> <a href="#">Profile </a> </div>
                          </div>
                          <div class="media-body">
                            <h5>Denise Walsh</h5>
                            <p>SEO Specialist - New York, USA</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, maxime, excepturi, mollitia, 
                              voluptatibus similique aliquid a dolores autem laudantium sapiente ad enim ipsa modi laborum 
                              accusantium deleniti neque architecto vitae.</p>
                            
                            <!-- Share -->
                            <div class="share-w"><a href="#."><i class="fa fa-bookmark-o"></i></a> <a href="#."><i class="fa fa-envelope-o"></i></a> <a href="#."><i class="fa fa-eye"></i></a></div>
                          </div>
                        </div>
                        
                        <!-- Similar -->
                        <div class="media">
                          <div class="media-left">
                            <div class="inn-simi"> <img class="media-object" src="../public/socio-assets/images/med-avatar.jpg" alt=""> <a href="#">Profile </a> </div>
                          </div>
                          <div class="media-body">
                            <h5>Denise Walsh</h5>
                            <p>SEO Specialist - New York, USA</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, maxime, excepturi, mollitia, 
                              voluptatibus similique aliquid a dolores autem laudantium sapiente ad enim ipsa modi laborum 
                              accusantium deleniti neque architecto vitae.</p>
                            
                            <!-- Share -->
                            <div class="share-w"><a href="#."><i class="fa fa-bookmark-o"></i></a> <a href="#."><i class="fa fa-envelope-o"></i></a> <a href="#."><i class="fa fa-eye"></i></a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Col -->
                  <div class="col-md-4"> 
                    
                    <!-- Professional Details -->
                    <div class="sidebar">
                      <h5 class="main-title">Professional Details</h5>
                      <div class="sidebar-information">
                        <ul class="single-category">
                          <li class="row">
                             @foreach($franquiciatarios as $franquiciatario)
                            <h6 class="title col-xs-6">Nombre</h6>
                            <span class="subtitle col-xs-6">{{$franquiciatario->nombrecompletofran}}</span></li>
                            @endforeach
                          <li class="row">
                            <h6 class="title col-xs-6">Age</h6>
                            <span class="subtitle col-xs-6">38 Years Old</span></li>
                          <li class="row">
                            <h6 class="title col-xs-6">Location</h6>
                            <span class="subtitle col-xs-6">Jordan Amman</span></li>
                          <li class="row">
                            <h6 class="title col-xs-6">Experiance</h6>
                            <span class="subtitle col-xs-6">15 Years</span></li>
                          <li class="row">
                            <h6 class="title col-xs-6">Dgree</h6>
                            <span class="subtitle col-xs-6">MBA</span></li>
                          <li class="row">
                            <h6 class="title col-xs-6">Career Lavel</h6>
                            <span class="subtitle col-xs-6">Mid-Level</span></li>
                          <li class="row">
                            <h6 class="title col-xs-6">Phone</h6>
                            <span class="subtitle col-xs-6">(800) 123-4567</span></li>
                          <li class="row">
                            <h6 class="title col-xs-6">Fax </h6>
                            <span class="subtitle col-xs-6">(800) 123-4568</span></li>
                          <li class="row">
                            <h6 class="title col-xs-6">E-mail</h6>
                            <span class="subtitle col-xs-6"><a href="#.">example@example.com</a></span></li>
                          <li class="row">
                            <h6 class="title col-xs-6">Website</h6>
                            <span class="subtitle col-xs-6"><a href="#.">example.com </a></span></li>
                        </ul>
                      </div>
                    </div>
                    
                    <!-- Rating -->
                    <div class="sidebar">
                      <h5 class="main-title">Rating</h5>
                      <div class="sidebar-information">
                        <ul class="single-category com-rate">
                          <li class="row">
                            <h6 class="title col-xs-6">Expertise:</h6>
                            <span class="col-xs-6"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i></span> </li>
                          <li class="row">
                            <h6 class="title col-xs-6">Knowledge:</h6>
                            <span class="col-xs-6"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-star-o"></i></span> </li>
                          <li class="row">
                            <h6 class="title col-xs-6">Quality::</h6>
                            <span class="col-xs-6"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i></span> </li>
                          <li class="row">
                            <h6 class="title col-xs-6">Price:</h6>
                            <span class="col-xs-6"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i></span> </li>
                          <li class="row">
                            <h6 class="title col-xs-6">Services:</h6>
                            <span class="col-xs-6"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i></span> </li>
                        </ul>
                      </div>
                    </div>
                    
                    <!-- Social Profiles -->
                    <div class="sidebar">
                      <h5 class="main-title">Social Profiles</h5>
                      <ul class="socil">
                        <li><a href="#."><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#."><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#."><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#."><i class="fa fa-twitter"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              

                 <!-- Facturación -->
              <div id="factura" class="tab-pane fade">
                <div class="header-listing">
                  <h6>Sort by</h6>
                  <div class="custom-select-box">
                    <select name="order" class="custom-select">
                      <option value="0">Most popular</option>
                      <option value="1">The latest</option>
                      <option value="2">The best rating</option>
                    </select>
                  </div>
                  <ul class="listing-views">
                    <li class="active"><a href="#"><i class="fa fa-list"></i></a></li>
                    <li><a href="#"><i class="fa fa-th"></i></a></li>
                    <li><a href="#"><i class="fa fa-th-large"></i></a></li>
                  </ul>
                </div>
                <div class="listing listing-1">
                  <div class="listing-section">
                    @foreach($facturasxmls as $facturasxml)
                    <div class="listing-ver-3">
                      <div class="listing-heading">
                        <h5>Fecha: {{$facturasxml->fecha}}</h5>
                        <ul class="bookmark list-inline">
                          <li><a href="#"><i class="fa fa-bookmark"></i></a></li>
                          <li><a href="#"><i class="fa fa-eye"></i></a></li>
                          <li><a href="#"><i class="fa fa-share"></i></a></li>
                        </ul>
                      </div>
                      <div class="listing-inner">
                        <div class="listing-content">
                    <h6 class="title-company">Folio: {{$facturasxml->folio}}</h6>
                          <h6 class="title-company">Descripción: {{$facturasxml->descripcion}}</h6>
                         <p>Subtotal: ${{$facturasxml->subimporte}}</p>
                          <p>Impuesto: {{$facturasxml->impuesto}} <a href="#"></a></p>
                           <p>Total: {{$facturasxml->importe}} <a href="#"></a></p>
                          <h6 class="title-tags">Descargar Facturas:</h6>
                          <ul >
              
                            <li><a href="{{$xmls->path()}}">descargar xml </a></li>
                             <li><a href="{{$pdfs->path()}}">descargar pdf </a></li>
              
                          </ul>
                        </div>
                      </div>
                      <div class="listing-tabs">
                        <ul>
 


                          <li><a href="#"><i class="fa fa-globe"></i> Moneda:{{$facturasxml->moneda}}  </a></li>
                           <li><a href="#"><i class="fa fa-globe"></i> Vice Presidente:  </a></li>
  
                         
                            <li><a href="#"><i class="fa fa-globe"></i> Coordindor: </a></li>
                        
                                      

                

                            <li><a href="#"><i class="fa fa-star"></i> Eres Miembro</a></li>
                    

                     
                     

                        </ul>
                      </div>
                    </div>
               @endforeach
                         <div class="text-center pt20">
                          <ul class="uou-paginatin list-unstyled">
                        <li>{{ $facturasxmls->fragment('factura')->links() }}</li>


                          </ul>
                        </div>
                 
                  </div>
                </div>
              </div>


               

           
              <!-- Contacto -->
              <div id="contacto" class="tab-pane fade">
                <div class="profile-main">
                  <h3>Contact the Company</h3>
                  <div class="profile-in">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate quis tenetur velit! Provident eum molestias aperiam suscipit distinctio ipsum cupiditate quasi, dolor sunt, cum reprehenderit quibusdam, repellendus eaque, quas magni.</p>
                    <form action="#">
                      <input type="text" placeholder="Name & Surname">
                      <input type="text" placeholder="E-mail address">
                      <input type="text" placeholder="Phone Number">
                      <textarea placeholder="Your Message"></textarea>
                      <button class="btn btn-primary">Send message</button>
                    </form>
                   <a href="https://calendar.google.com/calendar/embed?src=abelzmx%40gmail.com&ctz=America%2FMexico_City">aqui</a>
                 
                  </div>
                </div>
              </div>
              
              <!-- Tares -->
              <div id="tareas" class="tab-pane fade">
                <div class="profile-main">
                  <h3>Datos del/proyecto/tarea/actividad</h3>
                  <div class="profile-in">
                    <p>Puedes enviar una solicitud de tarea al departamento de Franquicias de TPSP.</p>
                    <form action="#">
                         <div class='col-sm-6'>
            <div class="form-group">
              <label>Fecha y hora Inicio:
                <div class='input-group datetime' id='datetimepicker1'>
                    <input type='text' class="form-control" placeholder="Fecha de inicio*" required> </label>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                 <label>Fecha y hora de Entrega:
                 <div class='input-group datetime' id='datetimepicker2'>
                    <input type='text' class="form-control" placeholder="Fecha de entrega*" required> </label>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group">
 <label>Prioridad *:
        <select style="width: 100%" class="form-control select2" name="prioridad" required>
         
          <option value="">Seleccione</option>
          <option value="Normal">Normal</option>
           <option value="Urgente">Urgente</option>
            <option value="Critico">Critico</option>
         
        </select> </label>
 <label>Tipo * :
          <select style="width: 100%" class="form-control select2" name="tipo" required>
           
          <option value="">Seleccione</option>
          <option value="Ventas">Ventas</option>
           <option value="Proceso">Proceso</option>
            <option value="Actividad">Actividad</option>
         
        </select> </label>
      </div>
      <br>

      <br>
      <br>
       <div class="form-group">
          <label>Nombre del proyecto: *</label>
                      <input type="text" placeholder="Nombre del proyecto/tarea/actividad" required="true">
                      <label>Descripción: *</label>
                      <textarea name="descripcion" placeholder="Descripción del proyecto/tarea/actividad" rows="4" cols="50"></textarea>
                      <label>¿Qué se requiere?: *</label>
                      <textarea name="descripcion" placeholder="¿Qué se requiere para realizarr el proyecto/tarea/actividad?" rows="4" cols="50"></textarea>
                      <button class="btn btn-primary">Send message</button>
                    </div>
                    </form>
                   <a href="https://calendar.google.com/calendar/embed?src=abelzmx%40gmail.com&ctz=America%2FMexico_City">aqui</a>
                 
                  </div>
                </div>
              </div>
              <!-- Portfolio -->
              <div id="portfolio" class="tab-pane fade">
                <div class="profile-main">
                  <h3>Portfolio</h3>
                  <div class="profile-in">
                    <div class="uou-portfolio"> 
                      <!-- Portfolio Item -->
                      <section class="portfolio">
                        <div class="portfolio-filters-content"> 
                          <!-- Portfolio Item -->
                          <article class="development design"> <a href="../public/socio-assets/img/portfolio-1.jpg" class="swipebox"> <img src="../public/socio-assets/img/portfolio-1.jpg" alt="" class="work img-responsive"> <span class="overlay"> <i class="fa fa-plus"></i> <b class="title"><strong>Photo Session</strong>Brands</b> </span> </a> </article>
                          <!-- Portfolio Item -->
                          <article class="design"> <a href="../public/socio-assets/img/portfolio-2.jpg" class="swipebox"> <img src="../public/socio-assets/img/portfolio-2.jpg" alt="" class="work img-responsive"> <span class="overlay"> <i class="fa fa-plus"></i> <b class="title"><strong>Photo Session</strong>Brands</b> </span> </a> </article>
                          <!-- Portfolio Item -->
                          <article class="development branding"> <a href="../public/socio-assets/img/portfolio-3.jpg" class="swipebox"> <img src="../public/socio-assets/img/portfolio-3.jpg" alt="" class="work img-responsive"> <span class="overlay"> <i class="fa fa-plus"></i> <b class="title"><strong>Photo Session</strong>Brands</b> </span> </a> </article>
                          <!-- Portfolio Item -->
                          <article class="development design"> <a href="../public/socio-assets/img/portfolio-6.jpg" class="swipebox"> <img src="../public/socio-assets/img/portfolio-6.jpg" alt="" class="work img-responsive"> <span class="overlay"> <i class="fa fa-plus"></i> <b class="title"><strong>Photo Session</strong>Brands</b> </span> </a> </article>
                          <!-- Portfolio Item -->
                          <article class="branding development"> <a href="../public/socio-assets/img/portfolio-4.jpg" class="swipebox"> <img src="../public/socio-assets/img/portfolio-4.jpg" alt="" class="work img-responsive"> <span class="overlay"> <i class="fa fa-plus"></i> <b class="title"><strong>Photo Session</strong>Brands</b> </span> </a> </article>
                          <!-- Portfolio Item -->
                          <article class="mobile branding"> <a href="../public/socio-assets/img/portfolio-5.jpg" class="swipebox"> <img src="../public/socio-assets/img/portfolio-5.jpg" alt="" class="work img-responsive"> <span class="overlay"> <i class="fa fa-plus"></i> <b class="title"><strong>Photo Session</strong>Brands</b> </span> </a> </article>
                          <!-- Portfolio Item -->
                          <article class="branding"> <a href="../public/socio-assets/img/portfolio-7.jpg" class="swipebox"> <img src="../public/socio-assets/img/portfolio-7.jpg" alt="" class="work img-responsive"> <span class="overlay"> <i class="fa fa-plus"></i> <b class="title"><strong>Photo Session</strong>Brands</b> </span> </a> </article>
                          <!-- Portfolio Item -->
                          <article class="branding"> <a href="../public/socio-assets/img/portfolio-2.jpg" class="swipebox"> <img src="../public/socio-assets/img/portfolio-2.jpg" alt="" class="work img-responsive"> <span class="overlay"> <i class="fa fa-plus"></i> <b class="title"><strong>Photo Session</strong>Brands</b> </span> </a> </article>
                          <!-- Portfolio Item -->
                          <article class="design development"> <a href="../public/socio-assets/img/portfolio-8.jpg" class="swipebox"> <img src="../public/socio-assets/img/portfolio-8.jpg" alt="" class="work img-responsive"> <span class="overlay"> <i class="fa fa-plus"></i> <b class="title"><strong>Photo Session</strong>Brands</b> </span> </a> </article>
                        </div>
                      </section>
                    </div>
                    <!-- end uou-portfolio --> 
                  </div>
                </div>
              </div>
           <!-- Evento Post -->
              <div id="docus" class="tab-pane fade">
              <h2>Documentos </h2>
<h3>selecciona la caja para ver los docuemntos</h3>
                <div class="profile-main">
                  <h2 class="text-center">Adecuación de Sucursal: Interior {{ Form::checkbox('interior', 0, null, ['id' => 'interior','class' => 'field']) }}</h2>
                  <div class="profile-in">
                    <div class="row">
                      <div style="display: none"  id="autoUpdate" class="col-md-12">
                        @foreach( $adecuacionsucursalinteriors as  $adecuacionsucursalinterior)
          
                       
                          <h1><a href="{{$adecuacionsucursalinterior->urldocu}}">{{$adecuacionsucursalinterior->nombredocu}}</a></h1>
                       
                          <a href="{{$adecuacionsucursalinterior->urldocu}}" class="btn btn-small btn-primary">Ir a Google Drive</a> </article>
                        <!-- end .uou-block-7f -->

                        @endforeach
           
                        <div class="text-center pt20">
                        
                        </div>
                      </div>
                    </div>
                    <!-- end row --> 
                    
                    <!-- end blog-content --> 
                    
                  </div>
                </div>
 <div class="profile-main">
                  <h2 class="text-center">Adecuación de Sucursal: Exterior {{ Form::checkbox('exterior', 0, null, ['id' => 'exterior','class' => 'field']) }}</h2>
                  <div class="profile-in">
                    <div class="row">
                      <div style="display: none" id="autoUpdate2" class="col-md-12">
                        @foreach( $adecuacionsucursalexteriors as  $adecuacionsucursalexterior)
          
                       
                          <h1><a href="{{$adecuacionsucursalexterior->urldocu}}">{{$adecuacionsucursalexterior->nombredocu}}</a></h1>
                       
                          <a href="{{$adecuacionsucursalexterior->urldocu}}" class="btn btn-small btn-primary">Ir a Google Drive</a> </article>
                        <!-- end .uou-block-7f -->

                        @endforeach
           
                        <div class="text-center pt20">
                        
                        </div>
                      </div>
                    </div>
                    <!-- end row --> 
                    
                    <!-- end blog-content --> 
                    
                  </div>
                </div>

                <div class="profile-main">
                  <h2 class="text-center">Impresos {{ Form::checkbox('impresos', 0, null, ['id' => 'impresos','class' => 'field']) }}</h2>
                  <div class="profile-in">
                    <div class="row">
                      <div style="display: none" id="autoUpdate3"  class="col-md-12">
                        @foreach( $impresos as  $impreso)
          
                       
                          <h1><a href="{{$impreso->urldocu}}">{{$impreso->nombredocu}}</a></h1>
                       
                          <a href="{{$impreso->urldocu}}" class="btn btn-small btn-primary">Ir a Google Drive</a> </article>
                        <!-- end .uou-block-7f -->

                        @endforeach
           
                        <div class="text-center pt20">
                        
                        </div>
                      </div>
                    </div>
                    <!-- end row --> 
                    
                    <!-- end blog-content --> 
                    
                  </div>
                </div>

                <div class="profile-main">
                  <h2 class="text-center">Video para Pantallas {{ Form::checkbox('video', 0, null, ['id' => 'video','class' => 'field']) }}</h2>
                  <div class="profile-in">
                    <div class="row">
                      <div style="display: none" id="autoUpdate4" class="col-md-12">
                        @foreach( $videopantallas as  $videopantalla)
          
                       
                          <h1><a href="{{$videopantalla->urldocu}}">{{$videopantalla->nombredocu}}</a></h1>
                       
                          <a href="{{$videopantalla->urldocu}}" class="btn btn-small btn-primary">Ir a Google Drive</a> </article>
                        <!-- end .uou-block-7f -->

                        @endforeach
           
                        <div class="text-center pt20">
                        
                        </div>
                      </div>
                    </div>
                    <!-- end row --> 
                    
                    <!-- end blog-content --> 
                    
                  </div>
                </div>





              </div>
       
             
              <!-- Blog Post -->
              <div id="citas" class="tab-pane fade">
                <div class="profile-main">
                 <button type="button"><a href="{{url('crear_cita')}}">Crear una cita</a></button> 

                  <div class="profile-in">
                    <div class="folow-persons">
                        <br>
                          <br>
                      <div class="box box-success">
  <!--<div class="box-header"></div>-->
  <div class="box-body">
    <table id="example1" class="table table-bordered">
    <thead>
    <tr class="success">
      @foreach( $listing_cols as $col )
      <th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
      @endforeach
      @if($show_actions)
      <th>Actions</th>
      @endif
    </tr>
    </thead>
    <tbody>

    </tbody>
    </table>
  </div>
</div>
     
               
              
              </div>
            </div>
          </div>
        </div>

              
              <!-- Blog Post -->
              <div id="foll-tabs" class="tab-pane fade">
                <div class="profile-main">
                  <h3>Following</h3>
                  <div class="profile-in">
                    <div class="folow-persons">
                      <ul>
                        
                        <!-- MEMBER -->
                        <li>
                          <div class="row">
                            <div class="col-xs-4"> 
                              <!-- Check Box -->
                              <div class="checkbox">
                                <input id="checkbox3-1" class="styled" type="checkbox">
                                <label for="checkbox3-1"></label>
                              </div>
                              <!-- Name -->
                              <div class="fol-name">
                                <div class="avatar"> <img src="../public/socio-assets/images/sm-avatar.jpg" alt=""> </div>
                                <h6>Collin Weiland</h6>
                                <span>Web Developer</span> </div>
                            </div>
                            <!-- Location -->
                            <div class="col-xs-3 n-p-r n-p-l"> <span>San Francisco, USA</span> </div>
                            <!-- Network -->
                            <div class="col-xs-3 n-p-r"> <span>21 Followers</span> <span>10 Following</span> </div>
                            <!-- Connections -->
                            <div class="col-xs-2 n-p-r n-p-l"> <span>31 Connections</span> </div>
                          </div>
                        </li>
                        
                        <!-- MEMBER -->
                        <li>
                          <div class="row"> 
                            <!-- Title -->
                            <div class="col-xs-4"> 
                              <!-- Check Box -->
                              <div class="checkbox">
                                <input id="checkbox3-2" class="styled" type="checkbox">
                                <label for="checkbox3-2"></label>
                              </div>
                              <!-- Name -->
                              <div class="fol-name">
                                <div class="avatar"> <img src="../public/socio-assets/images/sm-avatar.jpg" alt=""> </div>
                                <h6>Collin Weiland</h6>
                                <span>Web Developer</span> </div>
                            </div>
                            <!-- Location -->
                            <div class="col-xs-3 n-p-r n-p-l"> <span>San Francisco, USA</span> </div>
                            <!-- Network -->
                            <div class="col-xs-3 n-p-r"> <span>21 Followers</span> <span>10 Following</span> </div>
                            <!-- Connections -->
                            <div class="col-xs-2 n-p-r n-p-l"> <span>31 Connections</span> </div>
                          </div>
                        </li>
                        
                        <!-- MEMBER -->
                        <li>
                          <div class="row"> 
                            <!-- Title -->
                            <div class="col-xs-4"> 
                              <!-- Check Box -->
                              <div class="checkbox">
                                <input id="checkbox3-3" class="styled" type="checkbox">
                                <label for="checkbox3-3"></label>
                              </div>
                              <!-- Name -->
                              <div class="fol-name">
                                <div class="avatar"> <img src="../public/socio-assets/images/sm-avatar.jpg" alt=""> </div>
                                <h6>Collin Weiland</h6>
                                <span>Web Developer</span> </div>
                            </div>
                            <!-- Location -->
                            <div class="col-xs-3 n-p-r n-p-l"> <span>San Francisco, USA</span> </div>
                            <!-- Network -->
                            <div class="col-xs-3 n-p-r"> <span>21 Followers</span> <span>10 Following</span> </div>
                            <!-- Connections -->
                            <div class="col-xs-2 n-p-r n-p-l"> <span>31 Connections</span> </div>
                          </div>
                        </li>
                        
                        <!-- MEMBER -->
                        <li>
                          <div class="row"> 
                            <!-- Title -->
                            <div class="col-xs-4"> 
                              <!-- Check Box -->
                              <div class="checkbox">
                                <input id="checkbox3-4" class="styled" type="checkbox">
                                <label for="checkbox3-4"></label>
                              </div>
                              <!-- Name -->
                              <div class="fol-name">
                                <div class="avatar"> <img src="../public/socio-assets/images/sm-avatar.jpg" alt=""> </div>
                                <h6>Collin Weiland</h6>
                                <span>Web Developer</span> </div>
                            </div>
                            <!-- Location -->
                            <div class="col-xs-3 n-p-r n-p-l"> <span>San Francisco, USA</span> </div>
                            <!-- Network -->
                            <div class="col-xs-3 n-p-r"> <span>21 Followers</span> <span>10 Following</span> </div>
                            <!-- Connections -->
                            <div class="col-xs-2 n-p-r n-p-l"> <span>31 Connections</span> </div>
                          </div>
                        </li>
                        
                        <!-- MEMBER -->
                        <li>
                          <div class="row"> 
                            <!-- Title -->
                            <div class="col-xs-4"> 
                              <!-- Check Box -->
                              <div class="checkbox">
                                <input id="checkbox3-5" class="styled" type="checkbox">
                                <label for="checkbox3-5"></label>
                              </div>
                              <!-- Name -->
                              <div class="fol-name">
                                <div class="avatar"> <img src="../public/socio-assets/images/sm-avatar.jpg" alt=""> </div>
                                <h6>Collin Weiland</h6>
                                <span>Web Developer</span> </div>
                            </div>
                            <!-- Location -->
                            <div class="col-xs-3 n-p-r n-p-l"> <span>San Francisco, USA</span> </div>
                            <!-- Network -->
                            <div class="col-xs-3 n-p-r"> <span>21 Followers</span> <span>10 Following</span> </div>
                            <!-- Connections -->
                            <div class="col-xs-2 n-p-r n-p-l"> <span>31 Connections</span> </div>
                          </div>
                        </li>
                        
                        <!-- MEMBER -->
                        <li>
                          <div class="row"> 
                            <!-- Title -->
                            <div class="col-xs-4"> 
                              <!-- Check Box -->
                              <div class="checkbox">
                                <input id="checkbox3-6" class="styled" type="checkbox">
                                <label for="checkbox3-6"></label>
                              </div>
                              <!-- Name -->
                              <div class="fol-name">
                                <div class="avatar"> <img src="../public/socio-assets/images/sm-avatar.jpg" alt=""> </div>
                                <h6>Collin Weiland</h6>
                                <span>Web Developer</span> </div>
                            </div>
                            <!-- Location -->
                            <div class="col-xs-3 n-p-r n-p-l"> <span>San Francisco, USA</span> </div>
                            <!-- Network -->
                            <div class="col-xs-3 n-p-r"> <span>21 Followers</span> <span>10 Following</span> </div>
                            <!-- Connections -->
                            <div class="col-xs-2 n-p-r n-p-l"> <span>31 Connections</span> </div>
                          </div>
                        </li>
                        
                        <!-- MEMBER -->
                        <li>
                          <div class="row"> 
                            <!-- Title -->
                            <div class="col-xs-4"> 
                              <!-- Check Box -->
                              <div class="checkbox">
                                <input id="checkbox3-7" class="styled" type="checkbox">
                                <label for="checkbox3-7"></label>
                              </div>
                              <!-- Name -->
                              <div class="fol-name">
                                <div class="avatar"> <img src="../public/socio-assets/images/sm-avatar.jpg" alt=""> </div>
                                <h6>Collin Weiland</h6>
                                <span>Web Developer</span> </div>
                            </div>
                            <!-- Location -->
                            <div class="col-xs-3 n-p-r n-p-l"> <span>San Francisco, USA</span> </div>
                            <!-- Network -->
                            <div class="col-xs-3 n-p-r"> <span>21 Followers</span> <span>10 Following</span> </div>
                            <!-- Connections -->
                            <div class="col-xs-2 n-p-r n-p-l"> <span>31 Connections</span> </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('layouts.partials.file_manager')
@include('layouts.partials.footer')
@include('layouts.partials.scripts')

<script type="text/javascript">

$(document).ready(function(){
    $('#interior').change(function(){
        if(this.checked)
           $('#autoUpdate').show();
       
        else
             $('#autoUpdate').hide();

    });
      $('#exterior').change(function(){
        if(this.checked)
           $('#autoUpdate2').show();
       
        else
             $('#autoUpdate2').hide();

    });
        $('#impresos').change(function(){
        if(this.checked)
           $('#autoUpdate3').show();
       
        else
             $('#autoUpdate3').hide();

    });
          $('#video').change(function(){
        if(this.checked)
           $('#autoUpdate4').show();
       
        else
             $('#autoUpdate4').hide();

    });
    $(document).on('click','.show_more',function(){
        var ID = $(this).attr('id');
        $('.show_more').hide();
        $('.loding').show();
        $.ajax({
            type:'POST',
            url:'http://localhost/tpspplataforma/public/user_profile',
            data:'id='+ID,
            success:function(html){
                $('#show_more_main'+ID).remove();
                $('.tutorial_list').append(html);
            }
        }); 
    });
});


</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/59a99bdfc28eca75e461d9ae/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

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
                            '<img src="http://www.grupoemco.com.mx/" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                    }
                },
            {
                extend: 'pdfHtml5',
                
                message: 'Autopartes Legazpi',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                download: 'open', 
                exportOptions: { columns: ':visible' },
                 
            }
        
           
           
            
        ],
    processing: true,
        serverSide: true,
        ajax: "{{ url('/cita_dt_ajax') }}",
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
  $("#cita-add-form").validate({
    
  });
});
</script>

</body>


</html>