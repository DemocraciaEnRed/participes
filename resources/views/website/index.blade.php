
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Partícipes</title>
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,600,700" rel="stylesheet">
  <!-- inject:css-->
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <link rel="stylesheet" href="vendor_assets/css/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="vendor_assets/css/brands.css">
  <link rel="stylesheet" href="vendor_assets/css/fontawesome.min.css">
  <link rel="stylesheet" href="vendor_assets/css/jquery-ui.css">
  <link rel="stylesheet" href="vendor_assets/css/jquery.mCustomScrollbar.css">
  <link rel="stylesheet" href="vendor_assets/css/line-awesome.min.css">
  <link rel="stylesheet" href="vendor_assets/css/magnific-popup.css">
  <link rel="stylesheet" href="vendor_assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="vendor_assets/css/select2.min.css">
  <link rel="stylesheet" href="vendor_assets/css/slick.css">
  <link rel="stylesheet" href="vendor_assets/css/style.css">
  <!-- endinject -->
  <link rel="icon" type="image/png" sizes="32x32" href="img/fevicon.png">
</head>

<body>
  <section class="intro-wrapper bgimage overlay overlay--dark">
    <div class="bg_image_holder"><img src="http://laguiadelocioenparaguay.com/wp-content/uploads/2017/10/rosario2.jpg" alt=""></div>
    <div class="mainmenu-wrapper bg-blue">
      <div class="menu-area  menu--light">
        <div class="top-menu-area">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="menu-fullwidth">
                  <div class="logo-wrapper order-lg-0 order-sm-1">
                    <div class="logo logo-top">
                      <a href="index.php"><img src="img/logo-white.png" alt="logo image" class="img-fluid"></a>
                    </div>
                  </div><!-- ends: .logo-wrapper -->

                  <div class="menu-right order-lg-2 order-sm-2">

                    <!-- start .author-area -->
                    <div class="author-area">
                      <div class="">
                        <ul class="d-flex list-unstyled align-items-center">

                          <?php if (Auth::check()): ?>
                            <li class="nav-item dropdown p-top-10">
                                <a class=" dropdown-toggle"
                                   href="#"
                                   id="navbarDropdown"
                                   role="button"
                                   data-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false">
                                    <img src="{{ auth()->user()->present()->avatar }}"
                                         width="45"
                                         height="45"
                                         class="rounded-circle img-thumbnail img-responsive">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right position-absolute p-0" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item py-2" href="{{ route('profile') }}">
                                        <ion-icon name="person-outline"></ion-icon>
                                        Mi perfil
                                    </a>

                                    @if (config('session.driver') == 'database')
                                        <a href="{{ route('profile.sessions') }}" class="dropdown-item py-2">
                                            <ion-icon name="stats-chart-outline"></ion-icon>
                                            Actividad de usuario
                                        </a>
                                    @endif

                                    @hook('navbar:dropdown')

                                    <div class="dropdown-divider m-0"></div>

                                    <a class="dropdown-item py-2" href="{{ route('auth.logout') }}">
                                        <ion-icon name="log-out-outline"></ion-icon>
                                        Salir
                                    </a>
                                </div>
                            </li>
                          <?php else: ?>
                            <li>
                              <a href="login" class="btn btn-outline-light ">
                                Ingresar
                              </a>
                            </li>
                          <?php endif; ?>


                        </ul>
                      </div>
                    </div>
                    <!-- end .author-area -->

                  </div><!-- ends: .menu-right -->
                </div>
              </div>
            </div>
            <!-- end /.row -->
          </div>
          <!-- end /.container -->
        </div>
        <!-- end  -->
      </div>
    </div><!-- ends: .mainmenu-wrapper -->
    <div class="directory_content_area">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 m-bottom-40">
            <div class="search_title_area text-left">
              <p class="sub_title">Canal de gestión y seguimiento de proyectos, donde podes ver el avance de tus objetivos y metas</p>
              <button type="button" class="btn btn-lg btn-danger m-top-20" id="addNewFAQS">
                ¿Qué es partícipes?
              </button>
            </div>




          </div>
          <div class="col-lg-6 ">
            <img src="" alt="">
          </div>
        </div>
      </div>




    </div><!-- ends: .directory_search_area -->
  </section><!-- ends: .intro-wrapper -->

  <section class="all-listing-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="atbd_generic_header">
            <h4>Estado de objetivos y reportes</h4>

            <div class="atbd_listing_action_btn btn-toolbar align-items-center" role="toolbar">
              <!-- Views dropdown -->

              <!-- Orderby dropdown -->

              <div class="dropdown">
                <a class="action-btn dropdown-toggle" href="" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">2019 <span class="caret"></span></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                  <a class="dropdown-item active" href="">2019</a>
                  <a class="dropdown-item" href="">2018</a>
                </div>
              </div>
            </div><!-- ends: .atbd_listing_action_btn -->
          </div><!-- ends: .atbd_generic_header -->
        </div><!-- ends: .col-lg-12 -->
        <div class="col-lg-12 -items">
          <div class="row">

            <div class="col-lg-12 order-0 order-lg-1">
              <div class="row">

                <div class="col-lg-12">
                  <div class="atbd_single_listing atbd_listing_list  ">
                    <article class=" ">
                      <div class="atbd_content_upper ">
                        <div class=" m-top-30 ">
                          <div class="feature-list-wrapper ">
                            <div class="row m-left-10">


                              <div class="col-lg-2 nopadding">
                                <div class="icon"><span class="text-warning"><i class="la la-bullseye"></i>
                                    <h3 class="m-left-10">3</h3>
                                  </span></div>
                                <p class="text-dark">Objetivos publicados</p>
                              </div>

                              <div class="col-lg-2 nopadding">
                                <div class="icon"><span class="text-dark"><i class="la la-flag"></i>
                                    <h3 class="m-left-10">20</h3>
                                  </span></div>
                                <p class="text-dark">Metas publicadas</p>
                              </div>

                              <div class="col-lg-1 nopadding">
                                <div class="m-top-20">
                                  <span class="dot badge-success">
                                    <h4 class="m-left-25">10</h4>
                                  </span>
                                  <p class="text-dark">Alcanzadas </p>
                                </div>
                              </div>
                              <div class="col-lg-1 nopadding">
                                <div class="m-top-20">
                                  <span class="dot badge-warning">
                                    <h4 class="m-left-25">100</h4>
                                  </span>
                                  <p class="text-dark">En progreso </p>
                                </div>
                              </div>
                              <div class="col-lg-1 nopadding">
                                <div class="m-top-20">
                                  <span class="dot badge-danger">
                                    <h4 class="m-left-25">20</h4>
                                  </span>
                                  <p class="text-dark">Demoradas </p>
                                </div>
                              </div>
                              <div class="col-lg-1 nopadding">
                                <div class="m-top-20">
                                  <span class="dot badge-dark">
                                    <h4 class="m-left-25">10</h4>
                                  </span>
                                  <p class="text-dark">Inactivo </p>
                                </div>
                              </div>
                              <div class="col-lg-2 nopadding">
                                <div class="icon"><span class="text-info"><i class="la la-file"></i>
                                    <h3 class="m-left-10">25</h3>
                                  </span></div>
                                <p class="text-dark">Reportes realizados</p>
                              </div>


                            </div>


                          </div><!-- ends: .feature-list-wrapper -->
                        </div>


                    </article><!-- atbd_single_listing_wrapper -->

                  </div>
                </div><!-- ends: .col-lg-12 -->






              </div><!-- ends: .col-lg-8 -->
            </div>
          </div><!-- ends: .listing-items -->

        </div>
      </div>


  </section><!-- ends: .all-listing-wrapper -->


  <section class="all-listing-wrapper section-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-bottom-40">
          <div class="atbd_generic_header">

            <h4>Objetivos publicados</h4>


            <div class="atbd_listing_action_btn btn-toolbar align-items-center " role="toolbar">
              <!-- Views dropdown -->

              <!-- Orderby dropdown -->
              <div class="dropdown">
                <a class="action-btn dropdown-toggle" href="" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Más recientes <span class="caret"></span></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                  <a class="dropdown-item active" href="">Más recientes</a>
                  <a class="dropdown-item" href="">Destacados</a>
                  <a class="dropdown-item" href="">A a Z ( titulo )</a>
                </div>
              </div>
              <div class="dropdown">
                <a class="action-btn dropdown-toggle" href="" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Este año <span class="caret"></span></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                  <a class="dropdown-item active" href="">2019</a>
                  <a class="dropdown-item" href="">2018</a>
                  <a class="dropdown-item" href="">2017</a>
                </div>
              </div>
            </div><!-- ends: .atbd_listing_action_btn -->
          </div><!-- ends: .atbd_generic_header -->
        </div><!-- ends: .col-lg-12 -->
        <div class="col-lg-12 -items">
          <div class="row ">

            <div class="col-lg-12 order-0 order-lg-1 ">
              <div class="row">

                <div class="col-lg-12">
                  <div class="atbd_single_listing atbd_listing_list  ">
                    <article class="atbd_single_listing_wrapper card-1">
                      <div class="atbd_content_upper ">
                        <div class=" m-top-25 m-bottom-15">
                          <div class="feature-list-wrapper ">
                            <div class="row">

                              <div class="col-lg-1">
                                <div class="icon p-left-25"><span class="circle-dark">
                                    <ion-icon name="people" size="large"></ion-icon>
                                  </span></div>
                              </div>

                              <div class="col-lg-6 ">
                                <a href="objetivo" class="">
                                  <p class="text-dark font-weight-bold">Incrementar la participación de la sociedad civil organizada en procesos de co-creación con el Estado, para la definición, implementación y evaluación de las políticas públicas
                                    locales.</p>
                                </a>
                              </div>


                              <div class="col-lg-1 ">
                                <div class="icon"><span class="">
                                    <ion-icon name="document-outline" size="small"></ion-icon>
                                    <h5 class="p-left-5">2</h5>
                                  </span></div>
                              </div>

                              <div class="col-lg-1 nopadding ">
                                <div class="row m-top-5">
                                  <div class="col-lg-12  card-columns">

                                        <ion-icon class="color-warning" name="checkmark" size="small"></ion-icon>
                                        <h5 class="">50</h5>

                                  </div>
                                  <div class="col-lg-12  card-columns">

                                        <ion-icon name="close" size="small"></ion-icon>
                                        <h5 class="">20</h5>

                                  </div>
                                </div>
                              </div>

                              <div class="col-lg-1 ">
                                <canvas style="max-width:60px" id="doughnut-chart" width="45px" height="45px"></canvas>
                              </div>
                              <div class="col-lg-1 nopadding">
                                <h5 class=" m-top-20">6 metas</h5>
                              </div>
                              <div class="col-lg-1 button is-primary" data-hc-control="content01">
                                <ion-icon class="m-top-20" size="normal" name="chevron-down-outline"></ion-icon>
                              </div>


                            </div>
                          </div><!-- ends: .feature-list-wrapper -->
                        </div>
                      <div class="is-active" data-hc-content="content01">



                          <div class="feature-list-wrapper p-bottom-10">
                            <div class="row">

                              <div class="col-lg-4">
                                <div class="icon m-left-40 "><p class="text-dark font-weight-bold">
                                    <ion-icon name="flag" size="small"></ion-icon>
                                    Metas del objetivo
                                </p></div>

                              </div>



                              <div class="col-lg-3 offset-3">
                                <div class="icon m-left-15"><p class="text-dark font-weight-bold">
                                    <ion-icon name="document" size="small"></ion-icon>
                                    Ultimos reportes
                                </p></div>
                              </div>



                            </div>
                          </div>

                          <div class="feature-list-wrapper atbd_listing_info">
                            <div class="row">

                              <div class="col-lg-1 text-center nopadding">
                                <div class="atbd_listing_meta ">
                                  <span class="atbd_meta atbd_listing_rating bg-success ">100%</span>
                                </div>
                              </div>

                              <div class="col-lg-6 ">
                                <a href="objetivo" class="">
                                  <p class="text-dark font-weight-bold">Crear 2 nuevas normas o mecanismo de rendición de cuentas en las ciudades.</p>
                                </a>
                              </div>


                              <div class="col-lg-3 ">
                                <div class="icon m-left-15"><p class="text-dark font-weight-bold">
                                    <ion-icon style="max-height:15px;" name="document-outline" size="small"></ion-icon>
                                    Reporte Enero 2020
                                </p></div>
                              </div>


                              <div class="col-lg-2 text-center">
                                <div class="icon"><p class="">
                                    09.10.2020
                                </p></div>
                              </div>


                            </div>
                          </div><!-- ends: .feature-list-wrapper -->

                          <div class="feature-list-wrapper atbd_listing_info">
                            <div class="row">

                              <div class="col-lg-1 text-center nopadding">
                                <div class="atbd_listing_meta ">
                                  <span class="atbd_meta atbd_listing_rating bg-success ">100%</span>
                                </div>
                              </div>

                              <div class="col-lg-6 ">
                                <a href="objetivo" class="">
                                  <p class="text-dark font-weight-bold">Crear 4 nuevas propuestas ciudadanas debatidas en procesos públicos y con ...</p>
                                </a>
                              </div>


                              <div class="col-lg-3 ">
                                <div class="icon m-left-15"><p class="text-dark font-weight-bold">
                                    <ion-icon style="max-height:15px;"  name="document-outline" size="small"></ion-icon>
                                    Reporte Febrero 2020
                                </p></div>
                              </div>


                              <div class="col-lg-2 text-center">
                                <div class="icon"><p class="">
                                    08.10.2020
                                </p></div>
                              </div>


                            </div>
                          </div><!-- ends: .feature-list-wrapper -->

                          <div class="feature-list-wrapper atbd_listing_info">
                            <div class="row">

                              <div class="col-lg-1 text-center nopadding">
                                <div class="atbd_listing_meta ">
                                  <span class="atbd_meta atbd_listing_rating bg-warning "> 50% </span>
                                </div>
                              </div>

                              <div class="col-lg-6 ">
                                <a href="objetivo" class="">
                                  <p class="text-dark font-weight-bold">Recibir diez (10) consultas técnicas o invitaciones a colaborar que reciben ...</p>
                                </a>
                              </div>


                              <div class="col-lg-3 ">
                                <div class="icon m-left-15"><p class="text-dark font-weight-bold">

                                </p></div>
                              </div>


                              <div class="col-lg-2 text-center">
                                <div class="icon"><p class="">
                                </p></div>
                              </div>


                            </div>
                          </div><!-- ends: .feature-list-wrapper -->

                          <div class="feature-list-wrapper atbd_listing_info">
                            <div class="row">

                              <div class="col-lg-1 text-center nopadding">
                                <div class="atbd_listing_meta ">
                                  <span class="atbd_meta atbd_listing_rating bg-danger "> 40% </span>
                                </div>
                              </div>

                              <div class="col-lg-6 ">
                                <a href="objetivo" class="">
                                  <p class="text-dark font-weight-bold">Sumar a tres (3) la cantidad de referentes de las redes/espacios de acción ...</p>
                                </a>
                              </div>


                              <div class="col-lg-3 ">
                                <div class="icon m-left-15"><p class="text-dark font-weight-bold">

                                </p></div>
                              </div>


                              <div class="col-lg-2 text-center">
                                <div class="icon"><p class="">
                                </p></div>
                              </div>


                            </div>
                          </div><!-- ends: .feature-list-wrapper -->

                          <div class="feature-list-wrapper atbd_listing_info">
                            <div class="row">

                              <div class="col-lg-1 text-center nopadding">
                                <div class="atbd_listing_meta ">
                                  <span class="atbd_meta atbd_listing_rating bg-danger "> 20% </span>
                                </div>
                              </div>

                              <div class="col-lg-6 ">
                                <a href="objetivo" class="">
                                  <p class="text-dark font-weight-bold">Aumentar a cinco (5) la cantidad de articulos/entrevistas en prensa y menciones ...</p>
                                </a>
                              </div>


                              <div class="col-lg-3 ">
                                <div class="icon m-left-15"><p class="text-dark font-weight-bold">

                                </p></div>
                              </div>


                              <div class="col-lg-2 text-center">
                                <div class="icon"><p class="">
                                </p></div>
                              </div>


                            </div>
                          </div><!-- ends: .feature-list-wrapper -->

                          <div class="feature-list-wrapper atbd_listing_info p-top-10">
                            <div class="row">

                              <div class="col-lg-3 text-center">
                                <button style="max-height:40px; font-size:.8rem;" type="submit" class="btn btn-outline-info ">Ver todas las metas <ion-icon class="m-left-10 m-top-5  color-blue" name="arrow-forward-outline" role="img" ></ion-icon></button>

                              </div>

                              <div class="col-lg-4 ">

                              </div>


                              <div class="col-lg-3 ">
                                <div class="icon m-left-15"><p class="text-dark font-weight-bold">

                                </p></div>
                              </div>


                              <div class="col-lg-2 text-center">
                                <div class="icon"><p class="">
                                </p></div>
                              </div>


                            </div>
                          </div><!-- ends: .feature-list-wrapper -->

                          <div class="feature-list-wrapper atbd_listing_info p-bottom-20">
                            <div class="row">

                              <div class="col-lg-3 text-center">

                              </div>

                              <div class="col-lg-3 ">

                              </div>





                              <div class="col-lg-6  text-right p-right-50">
                                <button style="max-height:40px; font-size:.8rem;" type="submit" class="btn btn-outline-dark ">Monitorear objetivo <ion-icon class="m-left-10 m-top-5  color-dark" name="eye" role="img" ></ion-icon></button>
                                <?php if (Auth::check()): ?>
                                  <button style="max-height:40px; font-size:.8rem;" type="submit" class="btn btn-outline-info ">Ir a objetivo <ion-icon class="m-left-10 m-top-5  color-blue" name="arrow-forward-outline" role="img" ></ion-icon></button>

                                   <?php endif; ?>


                              </div>


                            </div>
                          </div><!-- ends: .feature-list-wrapper -->


                        </div>

                    </article><!-- atbd_single_listing_wrapper -->

                    <article class="atbd_single_listing_wrapper card-1">
                      <div class="atbd_content_upper ">
                        <div class=" m-top-25 m-bottom-15">
                          <div class="feature-list-wrapper atbd_listing_info">
                            <div class="row">

                              <div class="col-lg-1">
                                <div class="icon p-left-25"><span class="circle-dark">
                                    <ion-icon name="megaphone" size="large"></ion-icon>
                                  </span></div>
                              </div>

                              <div class="col-lg-6 ">
                                <a href="objetivo" class="">
                                  <p class="text-dark font-weight-bold">Fortalecer las capacidades de los actores territoriales para la incidencia en la agenda gubernamenta, la participación en espacios institucionales y el monitoreo de políticas públicas locales.</p>
                                </a>
                              </div>


                              <div class="col-lg-1 ">
                                <div class="icon"><span class="">
                                    <ion-icon name="document-outline" size="small"></ion-icon>
                                    <h5 class="p-left-5">2</h5>
                                  </span></div>
                              </div>

                              <div class="col-lg-1 nopadding ">
                                <div class="row m-top-5">
                                  <div class="col-lg-12  card-columns">

                                        <ion-icon class="color-warning" name="checkmark" size="small"></ion-icon>
                                        <h5 class="">50</h5>

                                  </div>
                                  <div class="col-lg-12  card-columns">

                                        <ion-icon name="close" size="small"></ion-icon>
                                        <h5 class="">20</h5>

                                  </div>
                                </div>
                              </div>

                              <div class="col-lg-1 ">
                                <canvas style="max-width:60px" id="doughnut-chart2" width="45px" height="45px"></canvas>
                              </div>
                              <div class="col-lg-1 nopadding">
                                <h5 class=" m-top-20">6 metas</h5>
                              </div>
                              <div class="col-lg-1 ">
                                <div class="col-lg-1 button is-primary" data-hc-control="content02">
                                  <ion-icon class="m-top-20" size="normal" name="chevron-down-outline"></ion-icon>
                                </div>                              </div>


                            </div>
                          </div><!-- ends: .feature-list-wrapper -->
                        </div>



                        <div class="atbd_listing_info">

                        </div>


                        <div class="" data-hc-content="content02">



                            <div class="feature-list-wrapper p-bottom-10">
                              <div class="row">

                                <div class="col-lg-4">
                                  <div class="icon m-left-40 "><p class="text-dark font-weight-bold">
                                      <ion-icon name="flag" size="small"></ion-icon>
                                      Metas del objetivo
                                  </p></div>

                                </div>



                                <div class="col-lg-3 offset-3">
                                  <div class="icon m-left-15"><p class="text-dark font-weight-bold">
                                      <ion-icon name="document" size="small"></ion-icon>
                                      Ultimos reportes
                                  </p></div>
                                </div>



                              </div>
                            </div>

                            <div class="feature-list-wrapper atbd_listing_info">
                              <div class="row">

                                <div class="col-lg-1 text-center nopadding">
                                  <div class="atbd_listing_meta ">
                                    <span class="atbd_meta atbd_listing_rating bg-success ">100%</span>
                                  </div>
                                </div>

                                <div class="col-lg-6 ">
                                  <a href="objetivo" class="">
                                    <p class="text-dark font-weight-bold">Crear 2 nuevas normas o mecanismo de rendición de cuentas en las ciudades.</p>
                                  </a>
                                </div>


                                <div class="col-lg-3 ">
                                  <div class="icon m-left-15"><p class="text-dark font-weight-bold">
                                      <ion-icon style="max-height:15px;" name="document-outline" size="small"></ion-icon>
                                      Reporte Enero 2020
                                  </p></div>
                                </div>


                                <div class="col-lg-2 text-center">
                                  <div class="icon"><p class="">
                                      09.10.2020
                                  </p></div>
                                </div>


                              </div>
                            </div><!-- ends: .feature-list-wrapper -->

                            <div class="feature-list-wrapper atbd_listing_info">
                              <div class="row">

                                <div class="col-lg-1 text-center nopadding">
                                  <div class="atbd_listing_meta ">
                                    <span class="atbd_meta atbd_listing_rating bg-success ">100%</span>
                                  </div>
                                </div>

                                <div class="col-lg-6 ">
                                  <a href="objetivo" class="">
                                    <p class="text-dark font-weight-bold">Crear 4 nuevas propuestas ciudadanas debatidas en procesos públicos y con ...</p>
                                  </a>
                                </div>


                                <div class="col-lg-3 ">
                                  <div class="icon m-left-15"><p class="text-dark font-weight-bold">
                                      <ion-icon style="max-height:15px;"  name="document-outline" size="small"></ion-icon>
                                      Reporte Febrero 2020
                                  </p></div>
                                </div>


                                <div class="col-lg-2 text-center">
                                  <div class="icon"><p class="">
                                      08.10.2020
                                  </p></div>
                                </div>


                              </div>
                            </div><!-- ends: .feature-list-wrapper -->

                            <div class="feature-list-wrapper atbd_listing_info">
                              <div class="row">

                                <div class="col-lg-1 text-center nopadding">
                                  <div class="atbd_listing_meta ">
                                    <span class="atbd_meta atbd_listing_rating bg-warning "> 50% </span>
                                  </div>
                                </div>

                                <div class="col-lg-6 ">
                                  <a href="objetivo" class="">
                                    <p class="text-dark font-weight-bold">Recibir diez (10) consultas técnicas o invitaciones a colaborar que reciben ...</p>
                                  </a>
                                </div>


                                <div class="col-lg-3 ">
                                  <div class="icon m-left-15"><p class="text-dark font-weight-bold">

                                  </p></div>
                                </div>


                                <div class="col-lg-2 text-center">
                                  <div class="icon"><p class="">
                                  </p></div>
                                </div>


                              </div>
                            </div><!-- ends: .feature-list-wrapper -->

                            <div class="feature-list-wrapper atbd_listing_info">
                              <div class="row">

                                <div class="col-lg-1 text-center nopadding">
                                  <div class="atbd_listing_meta ">
                                    <span class="atbd_meta atbd_listing_rating bg-danger "> 40% </span>
                                  </div>
                                </div>

                                <div class="col-lg-6 ">
                                  <a href="objetivo" class="">
                                    <p class="text-dark font-weight-bold">Sumar a tres (3) la cantidad de referentes de las redes/espacios de acción ...</p>
                                  </a>
                                </div>


                                <div class="col-lg-3 ">
                                  <div class="icon m-left-15"><p class="text-dark font-weight-bold">

                                  </p></div>
                                </div>


                                <div class="col-lg-2 text-center">
                                  <div class="icon"><p class="">
                                  </p></div>
                                </div>


                              </div>
                            </div><!-- ends: .feature-list-wrapper -->

                            <div class="feature-list-wrapper atbd_listing_info">
                              <div class="row">

                                <div class="col-lg-1 text-center nopadding">
                                  <div class="atbd_listing_meta ">
                                    <span class="atbd_meta atbd_listing_rating bg-danger "> 20% </span>
                                  </div>
                                </div>

                                <div class="col-lg-6 ">
                                  <a href="objetivo" class="">
                                    <p class="text-dark font-weight-bold">Aumentar a cinco (5) la cantidad de articulos/entrevistas en prensa y menciones ...</p>
                                  </a>
                                </div>


                                <div class="col-lg-3 ">
                                  <div class="icon m-left-15"><p class="text-dark font-weight-bold">

                                  </p></div>
                                </div>


                                <div class="col-lg-2 text-center">
                                  <div class="icon"><p class="">
                                  </p></div>
                                </div>


                              </div>
                            </div><!-- ends: .feature-list-wrapper -->

                            <div class="feature-list-wrapper atbd_listing_info p-top-10">
                              <div class="row">

                                <div class="col-lg-3 text-center">
                                  <button style="max-height:40px; font-size:.8rem;" type="submit" class="btn btn-outline-info ">Ver todas las metas <ion-icon class="m-left-10 m-top-5  color-blue" name="arrow-forward-outline" role="img" ></ion-icon></button>

                                </div>

                                <div class="col-lg-4 ">

                                </div>


                                <div class="col-lg-3 ">
                                  <div class="icon m-left-15"><p class="text-dark font-weight-bold">

                                  </p></div>
                                </div>


                                <div class="col-lg-2 text-center">
                                  <div class="icon"><p class="">
                                  </p></div>
                                </div>


                              </div>
                            </div><!-- ends: .feature-list-wrapper -->

                            <div class="feature-list-wrapper atbd_listing_info p-bottom-20">
                              <div class="row">

                                <div class="col-lg-3 text-center">

                                </div>

                                <div class="col-lg-3 ">

                                </div>





                                <div class="col-lg-6  text-right p-right-50">
                                  <button style="max-height:40px; font-size:.8rem;" type="submit" class="btn btn-outline-dark ">Monitorear objetivo <ion-icon class="m-left-10 m-top-5  color-dark" name="eye" role="img" ></ion-icon></button>
                                  <?php if (Auth::check()): ?>
                                    <button style="max-height:40px; font-size:.8rem;" type="submit" class="btn btn-outline-info ">Ir a objetivo <ion-icon class="m-left-10 m-top-5  color-blue" name="arrow-forward-outline" role="img" ></ion-icon></button>

                                     <?php endif; ?>


                                </div>


                              </div>
                            </div><!-- ends: .feature-list-wrapper -->


                          </div>
                    </article><!-- atbd_single_listing_wrapper -->

                    <article class="atbd_single_listing_wrapper card-1">
                      <div class="atbd_content_upper ">
                        <div class=" m-top-25 m-bottom-15">
                          <div class="feature-list-wrapper ">
                            <div class="row">

                              <div class="col-lg-1">
                                <div class="icon p-left-25"><span class="circle-dark">
                                    <ion-icon name="flash" size="large"></ion-icon>
                                  </span></div>
                              </div>

                              <div class="col-lg-6 ">
                                <a href="objetivo" class="">
                                  <p class="text-dark font-weight-bold">Propiciación y fortalecimiento de instancias de rendición de cuentas, deliberación y participacion ciudadana institucionalizadas en las ciudades de Buenos Aires, Córdoba, Rosario y el aglomerado urbano de Gran Mendoza.</p>
                                </a>
                              </div>


                              <div class="col-lg-1 ">
                                <div class="icon"><span class="">
                                    <ion-icon name="document-outline" size="small"></ion-icon>
                                    <h5 class="p-left-5">2</h5>
                                  </span></div>
                              </div>

                              <div class="col-lg-1 nopadding ">
                                <div class="row m-top-5">
                                  <div class="col-lg-12  card-columns">

                                        <ion-icon class="color-warning" name="checkmark" size="small"></ion-icon>
                                        <h5 class="">50</h5>

                                  </div>
                                  <div class="col-lg-12  card-columns">

                                        <ion-icon name="close" size="small"></ion-icon>
                                        <h5 class="">20</h5>

                                  </div>
                                </div>
                              </div>

                              <div class="col-lg-1 ">
                                <canvas style="max-width:60px" id="doughnut-chart3" width="45px" height="45px"></canvas>
                              </div>
                              <div class="col-lg-1 nopadding">
                                <h5 class=" m-top-20">6 metas</h5>
                              </div>
                              <div class="col-lg-1 ">
                                <ion-icon class="m-top-20" size="normal" name="chevron-down-outline"></ion-icon>
                              </div>


                            </div>
                          </div><!-- ends: .feature-list-wrapper -->
                        </div>



                        <div class="atbd_listing_info">

                        </div>

                    </article><!-- atbd_single_listing_wrapper -->


                  </div>
                </div><!-- ends: .col-lg-12 -->



              </div><!-- ends: .col-lg-8 -->
            </div>
          </div><!-- ends: .listing-items -->

        </div>
      </div>


  </section><!-- ends: .all-listing-wrapper -->


  <footer class="footer-three footer-grey p-top-20">

    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="footer-bottom--content">


              <a href="" class="footer-logo">
                <img style="max-height: 60px;" class="m-right-20 m-left-20" src="https://zenprospect-production.s3.amazonaws.com/uploads/pictures/5c2e26d9a3ae6122026ce0e9/picture" alt="">
                <img style="max-height: 40px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoCGcEqSL5Mij2ylyBgTbyehAFifrZkiJC0KyIsUDoiG8IGnRJ&s" alt="">
              </a>

              <div class=" lng-list">

                <img style="max-height: 40px;" class="" src="https://namati.org/wp-content/uploads/2019/02/logo-DER_negro-3-300x120.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- ends: .footer-bottom -->
  </footer><!-- ends: .footer -->



  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0C5etf1GVmL_ldVAichWwFFVcDfa1y_c"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <script>
    new Chart(document.getElementById("doughnut-chart"), {
      type: 'doughnut',
      data: {
        labels: ["En progreso", "Alcanzadas", "Demoradas", "Inactivo"],
        datasets: [{
          label: "Validaciones",
          backgroundColor: ["#fa8b0c", "#32cc6f", "#f16078", "#272b41"],
          data: [2, 2, 2, 2]
        }]
      },
      options: {
        legend: {
          display: false
        },
        tooltips: {
          enabled: false
        },
        title: {
          display: false,
          text: 'Predicted world population (millions) in 2050'
        }
      }
    });

    new Chart(document.getElementById("doughnut-chart2"), {
      type: 'doughnut',
      data: {
        labels: ["En progreso", "Alcanzadas", "Demoradas", "Inactivo"],
        datasets: [{
          label: "Validaciones",
          backgroundColor: ["#fa8b0c", "#32cc6f", "#f16078", "#272b41"],
          data: [2, 4, 2, 1]
        }]
      },
      options: {
        legend: {
          display: false
        },
        tooltips: {
          enabled: false
        },
        title: {
          display: false,
          text: 'Predicted world population (millions) in 2050'
        }
      }
    });

    new Chart(document.getElementById("doughnut-chart3"), {
      type: 'doughnut',
      data: {
        labels: ["En progreso", "Alcanzadas", "Demoradas", "Inactivo"],
        datasets: [{
          label: "Validaciones",
          backgroundColor: ["#fa8b0c", "#32cc6f", "#f16078", "#272b41"],
          data: [1, 7, 5, 2]
        }]
      },
      options: {
        legend: {
          display: false
        },
        tooltips: {
          enabled: false
        },
        title: {
          display: false,
          text: 'Predicted world population (millions) in 2050'
        }
      }
    });
  </script>
  <script>
      document.addEventListener(
          "DOMContentLoaded",
          () => {
              //Basic Accordion
              const basic = new HandyCollapse();
              //Nested
              const nested = new HandyCollapse({
                  nameSpace: "nested",
                  closeOthers: false
              });
              //Callback
              const callback = new HandyCollapse({
                  nameSpace: "callback",
                  closeOthers: false,
                  onSlideStart: (isOpen, contentID) => {
                      console.log(isOpen);
                      const buttonEl = document.querySelector(`[data-callback-control='${contentID}']`);
                      if (!buttonEl) return;
                      if (isOpen) {
                          buttonEl.textContent = "Opened " + contentID;
                      } else {
                          buttonEl.textContent = "Closed " + contentID;
                      }
                  }
              });
              //Callback
              const tab = new HandyCollapse({
                  nameSpace: "tab",
                  closeOthers: true,
                  isAnimation: false
              });
          },
          false
      );
  </script>
  <!-- inject:js-->
  <script src="theme_assets/js/handy-collapse.js"></script>
  <script src="vendor_assets/js/jquery/jquery-1.12.3.js"></script>
  <script src="vendor_assets/js/bootstrap/popper.js"></script>
  <script src="vendor_assets/js/bootstrap/bootstrap.min.js"></script>
  <script src="vendor_assets/js/jquery-ui.min.js"></script>
  <script src="vendor_assets/js/jquery.barrating.min.js"></script>
  <script src="vendor_assets/js/jquery.counterup.min.js"></script>
  <script src="vendor_assets/js/jquery.magnific-popup.min.js"></script>
  <script src="vendor_assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="vendor_assets/js/jquery.waypoints.min.js"></script>
  <script src="vendor_assets/js/masonry.pkgd.min.js"></script>
  <script src="vendor_assets/js/owl.carousel.min.js"></script>
  <script src="vendor_assets/js/select2.full.min.js"></script>
  <script src="vendor_assets/js/slick.min.js"></script>
  <script src="theme_assets/js/locator.js"></script>
  <script src="theme_assets/js/main.js"></script>
  <script src="theme_assets/js/map.js"></script>


  <!-- endinject-->
</body>

</html>
