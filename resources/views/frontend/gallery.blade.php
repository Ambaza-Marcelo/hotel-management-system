<!doctype html>
<html lang="en">

<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>Musumba hill's hotel</title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!--====== Animate css ======-->
    <link rel="stylesheet" href="assets/css/animate.css">
    
    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    
    <!--====== Slick css ======-->
    <link rel="stylesheet" href="assets/css/slick.css">
    
    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.css">
    
    <!--====== Default css ======-->
    <link rel="stylesheet" href="assets/css/default.css">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="assets/css/responsive.css">
  
  
</head>

<body>
   
    <!--====== PRELOADER PART START ======-->
    
    <div class="preloader">
        <div class="spin">
            <div class="cube1"></div>
            <div class="cube2"></div>
        </div>
    </div>
    
    <!--====== PRELOADER PART START ======-->
    
    <!--====== HEADER PART START ======-->
    
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.html">
                            <img src="assets/images/favicon.png" alt="Logo">
                        </a> <!-- Logo -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="bar-icon"></span>
                            <span class="bar-icon"></span>
                            <span class="bar-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                           <ul id="nav" class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="{{url('welcome-page')}}">Accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="{{ url('rooms')}}">Chambres</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="{{ url('restaurations')}}">Restauration</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="{{ url('news')}}">News</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="{{ url('gallery')}}">Gallerie</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="{{ url('events')}}">Evénement</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="{{ route('login') }}">Se connecter</a>
                                </li>
                            </ul>
                        </div>
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <section id="service" class="services-area pt-125 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-30">
                        <h5 class="mb-15">Hotel</h5>
                        <h3 class="title mb-15">musumba hill's hotel</h3>
                        <p>
                            L’hôtel est doté de différentes salles pour réunions et conférences ainsi que plusieurs salles pour réceptions et grands évènements, avec tous les équipements technologiques nécessaires.</p>
                    </div> <!-- section title -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="services-left mt-45">
                        <div class="services">
                            <img src="{{asset('images/undraw_Camera.svg')}}" alt="">
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-6">
                    <div class="services-left mt-45">
                        <div class="services">
                            <img src="{{asset('storage/restaurations/'.$restaurationz->image)}}" alt="">
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-6">
                    <div class="services-left mt-45">
                        <div class="services">
                            <img src="{{asset('images/undraw_image.svg')}}" alt="">
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-6">
                    
                    <div class="services-right mt-45">
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-sm-8">
                                <div class="single-services text-center">
                                    <div class="services-icon">
                                        <i class="lni-grid-alt"></i>
                                    </div>
                                    <div class="services-content mt-20">
                                        <h5 class="title mb-10">Chambres et Suites</h5>
                                        <p>L’Hôtel propose de solutions spacieuses et raffinées adaptables à toute exigence : chambre standard, suite junior, suite senior, suite présidentielle, et appartements pour les longs séjours. Les chambres offrent une vue magnifique sur la piscine et le jardin intérieur et sont toutes équipées avec TV satellitaire, connexion wifi à haut débit, climatisation, ligne téléphonique direct, mini frigo, coffre et salle de bain privé.</p>
                                    </div>
                                </div> <!-- single services -->
                                
                                <div class="single-services text-center mt-30">
                                    <div class="services-icon">
                                        <i class="lni-ruler-pencil"></i>
                                    </div>
                                    <div class="services-content mt-20">
                                        <h5 class="title mb-10">Restaurant</h5>
                                        <p>Une diversité de menus pour vos Pauses Café, vos déjeuner, cocktails et diner allant des propositions standard aux VIP afin de répondre à tous vos gouts.

Nos chefs vous offrent un choix considérable des plats d’une qualité toujours impeccable et un service haut de gamme.</p>
                                    </div>
                                </div> <!-- single services -->
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="single-services text-center mt-30">
                                    <div class="services-icon">
                                        <i class="lni-customer"></i>
                                    </div>
                                    <div class="services-content mt-20">
                                        <h5 class="title mb-10">Événements et Cérémonies</h5>
                                        <p>
Des événements VIP, cocktails, banquets, dîners, expositions, défilé de mode, mariages, l’Hôtel Musumba hill's  propose ses espaces fonctionnels pour des évènements complètement personnalisés.</p>
                                    </div>
                                </div> <!-- single services -->
                                
                                <div class="single-services text-center mt-30">
                                    <div class="services-icon">
                                        <i class="lni-support"></i>
                                    </div>
                                    <div class="services-content mt-20">
                                        <h5 class="title mb-10">Conférences</h5>
                                        <p>
Les salles de réunions, de conception et de disposition modulaires, sont personnalisables en vue de satisfaire au mieux vos exigences et accueillir une variété d’événements allant de réunions de petits groupes aux grands: quel que soit le type de séminaire que vous envisagez, l’Hôtel Musumba Hill's vous permet de donner une dimension nouvelle à vos réunions d’équipe ou d’affaires.</p>
                                    </div>
                                </div> <!-- single services -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- services right -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== SERVICES PART ENDS ======-->

    <!--====== SHOWCASE PART START ======-->
    
    <section id="showcase" class="showcase-area pt-100 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="showcase-title pt-25">
                        <h2 class="title">Hotel</h2>
                    </div> <!-- showcase title -->
                </div> 
                <div class="col-lg-6">
                    <div class="showcase-title pt-25">
                        <p>L’Hôtel Musumba Hill's ****, avec 19 chambres et différents appartements, est le plus grand complexe hôtelier au Province de Kayanza. L’hôtel offre un logement relaxant sur la route goudronée no 6, dans un cadre naturel et verdoyant. à moins de 3 km du centre ville.
                            L’hôtel est doté de différentes salles pour réunions et conférences ainsi que plusieurs salles pour réceptions, cocktails et grands évènements, avec tous les équipements technologiques nécessaires.

                            Les restaurants et les bars de l’hôtel offrent une cuisine diversifiée et toujours savoureuse, idéale pour les petits désirs ainsi que les repas plus conviviaux.

                            Les animations musicales, les évènements culturels, la sauna et la salle de fitness sont enfin des raisons valables pour passer une agréable journée à Musumba Hill's Hotel.</p>
                    </div> <!-- showcase title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="showcase-active mt-65">
                      @foreach($images as $image)
                        <div class="single-showcase">
                            <img src="{{asset('storage/gallery/'.$image->meta_value)}}" alt="Gallerie">
                        </div> <!-- single showcase -->
                      @endforeach
                    </div> <!-- showcase active -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <section id="contact" class="contact-area pt-115">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="contact-title text-center">
                        <h2 class="title">Contactez-nous</h2>
                    </div> <!-- contact title -->
                </div>
            </div> <!-- row -->
            <div class="contact-box mt-70">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-info pt-25">
                            <h4 class="info-title">Contact</h4>
                            <ul>
                                <li>
                                    <div class="single-info mt-30">
                                        <div class="info-icon">
                                            <i class="lni-phone-handset"></i>
                                        </div>
                                        <div class="info-content">
                                            <p><!--$phone->meta_value -->+25762785400</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                                <li>
                                    <div class="single-info mt-30">
                                        <div class="info-icon">
                                            <i class="lni-envelope"></i>
                                        </div>
                                        <div class="info-content">
                                            <p><!--$email->meta_value-->marcelo@gmail.com</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                                <li>
                                    <div class="single-info mt-30">
                                        <div class="info-icon">
                                            <i class="lni-home"></i>
                                        </div>
                                        <div class="info-content">
                                            <p><!--$address->meta_value-->kirema,kayanza</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                            </ul>
                        </div> <!-- contact info -->
                    </div> 
                    <div class="col-lg-8">
                        <div class="contact-form">
                            <form id="contact-form" action="{{URL::route('site.contact_us_form')}}" method="post" data-toggle="validator">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-form form-group">
                                            <input type="text" name="name" placeholder="Entrer votre nom" data-error="Name is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- single form -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-form form-group">
                                            <input type="email" name="email" placeholder="Entrer votre E-mail"  data-error="Valid email is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- single form -->
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single-form form-group">
                                            <textarea name="message" placeholder="Entrer votre message" data-error="Please,leave us a message." required="required"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- single form -->
                                    </div>
                                    <p class="form-message"></p>
                                    <div class="col-lg-12">
                                        <div class="single-form form-group">
                                            <button class="main-btn" type="submit">CONTACTER</button>
                                        </div> <!-- single form -->
                                    </div>
                                </div> <!-- row -->
                            </form>
                        </div> <!-- row -->
                    </div> 
                </div> <!-- row -->
            </div> <!-- contact box -->
        </div> <!-- container -->
    </section>
    
    <!--====== CONTACT PART ENDS ======-->

    <!--====== FOOTER PART START ======-->
    
    <section id="footer" class="footer-area">
        <div class="container">
            <div class="footer-widget pt-75 pb-120">
                <div class="row">
                    <div class="col-lg-3 col-md-5 col-sm-7">
                        <div class="footer-logo mt-40">
                            <a href="#">
                                <img src="assets/images/favicon.png" alt="Logo">
                            </a>
                            <p class="mt-10">L’Hôtel Musumba Hill's, avec 19 chambres et différents appartements, est le plus grand complexe hôtelier au Province de Kayanza. L’hôtel offre un logement relaxant sur la route goudronée no 6, dans un cadre naturel et verdoyant. à moins de 3 km du centre ville.</p>
                            <ul class="footer-social mt-25">
                                <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                <li><a href="#"><i class="lni-instagram"></i></a></li>
                            </ul>
                        </div> <!-- footer logo -->
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-5">
                        <div class="footer-link mt-50">
                            <h5 class="f-title">Services</h5>
                            <ul>
                                <li><a href="#">Hébergement</a></li>
                                <li><a href="#">Restaurant</a></li>
                                <li><a href="#">Bar</a></li>
                                <li><a href="#">Salle de réunion</a></li>
                                <li><a href="#">Sauna</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-5">
                        <div class="footer-link mt-50">
                            <h5 class="f-title">Aide</h5>
                            <ul>
                                <li><a href="#">Employés</a></li>
                                <li><a href="#">Chambres</a></li>
                                <li><a href="#">Centre d'aide</a></li>
                                <li><a href="#">Contactez-nous</a></li>
                                <li><a href="#">Sécurité</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-7">
                        <div class="footer-info mt-50">
                            <h5 class="f-title">Contact</h5>
                            <ul>
                                <li>
                                    <div class="single-footer-info mt-20">
                                        <span>Phone :</span>
                                        <div class="footer-info-content">
                                            <p><!--$phone->meta_value -->+25762785400</p>
                          
                                        </div>
                                    </div> <!-- single footer info -->
                                </li>
                                <li>
                                    <div class="single-footer-info mt-20">
                                        <span>Email :</span>
                                        <div class="footer-info-content">
                                            <p><!--$email->meta_value --> marcelo@gmail.com</p>
                                            
                                        </div>
                                    </div> <!-- single footer info -->
                                </li>
                                <li>
                                    <div class="single-footer-info mt-20">
                                        <span>Address :</span>
                                        <div class="footer-info-content">
                                            <p><!--$address->meta_value--> kirema,kayanza</p>
                                        </div>
                                    </div> <!-- single footer info -->
                                </li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer widget -->
            <div class="footer-copyright pt-15 pb-15">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright text-center">
                            <p>{{config('app.name')}} &copy; {{date('Y')}} || @lang('Tous les droits sont réservés || ')<a href="mailto:ambazamarcellin2001@gmail.com" rel="nofollow">{{config('app.maintainer')}}</a></p>
                        </div> <!-- copyright -->
                    </div>
                </div> <!-- row -->
            </div> <!--  footer copyright -->
        </div> <!-- container -->
    </section>
    
    <!--====== FOOTER PART ENDS ======-->
    
    <!--====== BACK TO TOP PART START ======-->
    
    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>
    
    <!--====== BACK TO TOP PART ENDS ======-->
    
    
    
    
    
    
    
    
    
    
    <!--====== jquery js ======-->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="assets/js/bootstrap.min.js"></script>
    
    
    <!--====== Slick js ======-->
    <script src="assets/js/slick.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>

    
    <!--====== nav js ======-->
    <script src="assets/js/jquery.nav.js"></script>
    
    <!--====== Nice Number js ======-->
    <script src="assets/js/jquery.nice-number.min.js"></script>
    
    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>

</body>

</html>
