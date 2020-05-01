website<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Partícipes</title>
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,600,700" rel="stylesheet">
  <!-- inject:css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

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

  <section class="overlay--dark fixed-top ">
    <div class="mainmenu-wrapper bg-blue">
      <div class="menu-area  menu--light">
        <div class="top-menu-area">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="menu-fullwidth">
                  <div class="logo-wrapper order-lg-0 order-sm-1">
                    <div class="logo logo-top">
                      <a href="website"><img src="img/logo-white.png" alt="logo image" class="img-fluid"></a>
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

  </section><!-- ends: .intro-wrapper -->
  <div class="wrapper">

    <div id="sidebar">

      <section class="intro-wrapper2 bgimage overlay overlay--light">
        <div class="bg_image_holder"><img src="http://laguiadelocioenparaguay.com/wp-content/uploads/2017/10/rosario2.jpg" alt=""></div>


      </section><!-- ends: .intro-wrapper -->

      <div class="widget atbd_widget widget-card">

            <div class="widget-body atbd_author_info_widget">
              <div class="atbd_avatar_wrapper">
                <div class="atbd_review_avatar">
                  <img src="img/avatar-60x60.jpg" alt="Avatar Image">
                </div>
                <div class="atbd_name_time">

                  <span class="text-dark p">#etiqueta1 #etiqueta2 #etiqueta3 #etiqueta4</span>
                </div>
              </div><!-- ends: .atbd_avatar_wrapper -->
              <div class="atbd_widget_contact_info">
                <h5 class="m-bottom-15">Incrementar la participación de la sociedad civil organizada en procesos de co-creación con el Estado, para la definición, implementación y evaluación de las políticas públicas
                  locales. </h5>
              </div><!-- ends: .atbd_widget_contact_info -->
              <span class="text-dark"> Unirse a la comunidad </span>
              <div class="row">
              <div class="col-lg-6">
              <a href="" class="btn btn-xs btn-outline-success "><span class=" la la-whatsapp"></span>WhatsApp</a>
            </div>
            <div class="col-lg-4">
                <a href="" class="btn btn-xs btn-outline-info "><span class=" la la-telegram"></span>Telegram </a>
              </div>
            </div><!-- ends: .widget-body -->
            <div class="widget widget_pages">
              <h2 class="widget-title"></h2>
              <ul class="list-unstyled text-bold">
                <li class="page-item h5 text-info"><a href="">Todas las metas</a></li>

                <li class="page-item"><a href="">Crear 2 nuevas normas o mecanismo de rendición de cuentas en las ciudades</a></li>
                <li class="page-item"><a href="">Crear 4 nuevas propuestas ciudadanas debatidas en procesos públicos y con incidencia en la agenda gubernamental</a></li>
                <li class="page-item"><a href="">Recibir diez (10) consultas técnicas o invitaciones a colaborar que reciben las redes/instancias locales de acción colectiva</a></li>
                <li class="page-item"><a href="">Sumar a tres (3) la cantidad de referentes de las rede/espacios de acción colectiva participando en instancias</a></li>
                <li class="page-item"><a href="">Aumentar a cinco la Cantidad de articulos/entrevistas en prensa y menciones en redes sociales que refierana las ...</a></li>
                <li class="page-item"><a href="">Incrementar el grado de posicionamiento y legitimidad de las redes de acción colectiva en el nivel local</a></li>
              </ul>
            </div>
          </div>
        </div>

    </div>

    <!-- Page Content -->
    <div id="content">



      <section class="all-listing-wrapper  section-bg ">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="atbd_generic_header">
                <h4>Estado del objetivo</h4>

                <div class="atbd_listing_action_btn btn-toolbar align-items-center" role="toolbar">
                  <!-- Views dropdown -->

                  <!-- Orderby dropdown -->

                </div><!-- ends: .atbd_listing_action_btn -->
              </div><!-- ends: .atbd_generic_header -->
            </div><!-- ends: .col-lg-12 -->
            <div class="col-lg-12  section-bg-w m-top-5">
              <div class="row m-bottom-20">

                <div class="col-lg-12 order-0 order-lg-1">
                  <div class="row">

                    <div class="col-lg-12">
                      <div class="atbd_single_listing atbd_listing_list  ">
                        <article class=" ">
                          <div class="atbd_content_upper ">
                            <div class=" m-top-30 ">
                              <div class="feature-list-wrapper ">
                                <div class="row m-left-10">


                                  <div class="col-lg-3 ">
                                    <canvas style="max-width:150px" id="doughnut-chart" width="150px" height="150px"></canvas>

                                  </div>

                                  <div class="col-lg-3">
                                    <div class="row">
                                      <div class="col-lg-6 ">
                                        <div class="m-top-20">
                                          <span class="dot badge-success">
                                            <h4 class="m-left-25">10</h4>
                                          </span>
                                          <p class="text-dark">Alcanzadas </p>
                                        </div>
                                      </div>
                                      <div class="col-lg-6 ">
                                        <div class="m-top-20">
                                          <span class="dot badge-warning">
                                            <h4 class="m-left-25">100</h4>
                                          </span>
                                          <p class="text-dark">En progreso </p>
                                        </div>
                                      </div>
                                      <div class="col-lg-6 ">
                                        <div class="m-top-20">
                                          <span class="dot badge-danger">
                                            <h4 class="m-left-25">20</h4>
                                          </span>
                                          <p class="text-dark">Demoradas </p>
                                        </div>
                                      </div>
                                      <div class="col-lg-6 ">
                                        <div class="m-top-20">
                                          <span class="dot badge-dark">
                                            <h4 class="m-left-25">10</h4>
                                          </span>
                                          <p class="text-dark">Inactivo </p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-5 ">
                                    <button type="submit" class="btn btn-outline-dark btn-block">Monitorear objetivo <ion-icon style="font-size: 22px;  vertical-align: middle;" class="m-left-10" name="eye-outline"></ion-icon></button>
                                    <div class="widget-body atbd_author_info_widget m-top-20">
                                      <div class="atbd_avatar_wrapper">
                                        <div class="col-lg-3 ">
                                          <div class="atbd_review_avatar">
                                            <img style="max-width: 60px;" src="https://media-exp1.licdn.com/dms/image/C4D0BAQG_TDv0fLkZJg/company-logo_200_200/0?e=2159024400&v=beta&t=BNyTZVCi-SpVkxyPhSfWfuya3UGb5LLtnd8JTZ06zSI" alt="Avatar Image">
                                          </div>
                                        </div>
                                        <div class="col-lg-9 ">
                                          <h5>Fundación Avina </h5>
                                          <p>Promueve la sustentabilidad a partir de procesos colaborativos, generando impactos positivos a gran escala</p>
                                        </div>
                                      </div><!-- ends: .atbd_avatar_wrapper -->




                                    </div><!-- ends: .widget-body -->
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


      <section class="all-listing-wrapper  section-bg ">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="atbd_generic_header">
                <h4>Reportes</h4>

                <div class="atbd_listing_action_btn btn-toolbar align-items-center" role="toolbar">
                  <!-- Views dropdown -->

                  <!-- Orderby dropdown -->

                </div><!-- ends: .atbd_listing_action_btn -->
              </div><!-- ends: .atbd_generic_header -->
            </div><!-- ends: .col-lg-12 -->

            <div class="atbd_content_upper">


              <div class="feature-list-wrapper m-bottom-10 col-lg-12">
                <div class="row m-left-10">
                  <div class="atbd_content_module atbd_review_form">
                    <div class="atbdb_content_module_contents atbd_give_review_area card-1">

                      <span class="badge badge-update">actualización</span>
                      <span class="badge alert-link "> Compartir <ion-icon name="share-social-outline"></ion-icon>
                      </span>

                      <p class="text-dark " >Crear 2 nuevas formas o mecanismo de rendición de cuentas en las ciudades</p>
                      <h6 class="m-top-5"> Reporte Febrero 2020 </h6>
                      <div class="row m-bottom-10">
                        <div class="col-lg-1 m-top-10">
                          <h6 class="badge badge-success">60 %</h6>
                        </div>
                        <div class="col-lg-6">
                          <div class="progress m-top-15" style="min-height: 10px !important;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">

                            </div>

                          </div>
                        </div>
                      </div>

                      <p>Se mejoraron diez kilómetros de ciclovías, donde se cambiaron los carteles dde señalización vial, la luminaria, se mejoró la clzada y las divisiones.</p>

                      <form action="/" id="atbdp_review_form" method="post">



                        <!--If current user has a review then show him update and delete button-->
                        <div class="row">
                          <div class="col-lg-6">
                          <h6 class="m-top-20"> Ver más detalles <ion-icon name="chevron-down-outline"></ion-icon></h6>
                          </div>
                          <div class="col-lg-6 ">
                            <div class="check-btn m-top-10 atbd_content_right ">
                              <div class="btn-checkbox active-color-success">
                                <label>
                                  <input type="checkbox" value="1">  <span class="color-success font-weight-bold "><h6 class=" badge-pill m-right-10 badge-success"> 50 </h6>Cierto<i class="la la-check  m-left-10 font-weight-bold"></i></span>
                                </label>
                              </div>
                              <div class="btn-checkbox active-color-danger">
                                <label>
                                  <input type="checkbox" value="1">  <span class="color-danger font-weight-bold "><h6 class=" badge-pill m-right-10 badge-danger"> 20 </h6>Falso<i class="la la-check  m-left-10 font-weight-bold"></i></span>
                                </label>
                              </div>
                            </div>
                          </div>

                        </div>
                      </form>
                    </div><!-- ends: .atbd_give_review_area -->
                  </div><!-- ends: .atbd_content_module -->


                </div>


              </div>

              <div class="feature-list-wrapper m-bottom-10 p-top-20 col-lg-12">
                <div class="row m-left-10">
                  <div class="atbd_content_module atbd_review_form">
                    <div class="atbdb_content_module_contents atbd_give_review_area card-1">

                      <span class="badge badge-update">actualización</span>
                      <span class="badge alert-link "> Compartir <ion-icon name="share-social-outline"></ion-icon>
                      </span>

                      <p class="text-dark " >Crear 2 nuevas formas o mecanismo de rendición de cuentas en las ciudades</p>
                      <h6 class="m-top-5"> Reporte Febrero 2020 </h6>
                      <div class="row m-bottom-10">
                        <div class="col-lg-1 m-top-10">
                          <h6 class="badge badge-success">60 %</h6>
                        </div>
                        <div class="col-lg-6">
                          <div class="progress m-top-15" style="min-height: 10px !important;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">

                            </div>

                          </div>
                        </div>
                      </div>

                      <p>Se mejoraron diez kilómetros de ciclovías, donde se cambiaron los carteles dde señalización vial, la luminaria, se mejoró la clzada y las divisiones.</p>

                      <form action="/" id="atbdp_review_form" method="post">



                        <!--If current user has a review then show him update and delete button-->
                        <div class="row">
                          <div class="col-lg-6">
                          <h6 class="m-top-20"> Ver más detalles <ion-icon name="chevron-down-outline"></ion-icon></h6>
                          </div>
                          <div class="col-lg-6 ">
                            <div class="check-btn m-top-10 atbd_content_right ">
                              <div class="btn-checkbox active-color-success">
                                <label>
                                  <input type="checkbox" value="1">  <span class="color-success font-weight-bold "><h6 class=" badge-pill m-right-10 badge-success"> 50 </h6>Cierto<i class="la la-check  m-left-10 font-weight-bold"></i></span>
                                </label>
                              </div>
                              <div class="btn-checkbox active-color-danger">
                                <label>
                                  <input type="checkbox" value="1">  <span class="color-danger font-weight-bold "><h6 class=" badge-pill m-right-10 badge-danger"> 20 </h6>Falso<i class="la la-check  m-left-10 font-weight-bold"></i></span>
                                </label>
                              </div>
                            </div>
                          </div>

                        </div>
                      </form>
                    </div><!-- ends: .atbd_give_review_area -->
                  </div><!-- ends: .atbd_content_module -->


                </div>


              </div>

              <div class="feature-list-wrapper p-top-20 col-lg-12">
                <div class="row m-left-10">
                  <div class="atbd_content_module atbd_review_form">
                    <div class="atbdb_content_module_contents atbd_give_review_area card-1 ">

                      <span class="badge badge-danger">Inicio</span>
                      <span class="badge alert-link "> Compartir <ion-icon name="share-social-outline"></ion-icon>
                      </span>
                      <a href="meta" class="">
                      <p class="text-dark " >Incrementar el grado de posicionamiento y legitimidad de las redes de acción colectiva en el nivel local</p>

                      <h6 class="m-top-5"> Inicio de posicionamiento </h6>

  </a>
                      <p>Comenzó la implementación de mejores de ciclovías de Rosario. La obra está a cargo de la empresa Rotich S.A</p>

                      <form action="/" id="atbdp_review_form" method="post">



                        <!--If current user has a review then show him update and delete button-->
                        <div class="row">
                          <div class="col-lg-6">
                          <h6 class="m-top-20"> Ver más detalles <ion-icon name="chevron-down-outline"></ion-icon></h6>
                          </div>
                          <div class="col-lg-6 ">
                            <div class="check-btn m-top-10 atbd_content_right ">
                              <div class="btn-checkbox active-color-success">
                                <label>
                                  <input type="checkbox" value="1">  <span class="color-success font-weight-bold "><h6 class=" badge-pill m-right-10 badge-success"> 50 </h6>Cierto<i class="la la-check  m-left-10 font-weight-bold"></i></span>
                                </label>
                              </div>
                              <div class="btn-checkbox active-color-danger">
                                <label>
                                  <input type="checkbox" value="1">  <span class="color-danger font-weight-bold "><h6 class=" badge-pill m-right-10 badge-danger"> 20 </h6>Falso<i class="la la-check  m-left-10 font-weight-bold"></i></span>
                                </label>
                              </div>
                            </div>
                          </div>

                        </div>
                      </form>
                    </div><!-- ends: .atbd_give_review_area -->
                  </div><!-- ends: .atbd_content_module -->


                </div>


              </div><!-- ends: .feature-list-wrapper -->

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
    </div>

  </div>










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
          data: [100, 10, 20, 10]
        }]
      },
      options: {
        legend: {
          display: false
        },
        tooltips: {
          enabled: true
        },
        title: {
          display: false,
          text: ''
        }
      }
    });

    $(document).ready(function() {
      $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
      });
    });
  </script>
  <!-- inject:js-->
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>


  <!-- endinject-->
</body>

</html>
