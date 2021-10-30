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
                                <li class="nav-item active">
                                    <a data-scroll-nav="0" href="#home">Accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="#product">Chambres</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="{{ url('restaurations')}}">Restauration</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="#service">News</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="#showcase">Gallerie</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="#blog">Evénement</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="#contact">Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="{{ route('login') }}">Se connecter</a>
                                </li>
                            </ul> <!-- navbar nav -->
                        </div>
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    
    <!--====== HEADER PART ENDS ======-->
   
    <!--====== SLIDER PART START ======-->
    
    <section id="home" class="slider-area pt-100">
        <div class="container-fluid position-relative">
            <div class="slider-active">
              @foreach($sliders as $slider)
                <div class="single-slider">
                    <div class="slider-bg">
                        <div class="row no-gutters align-items-center ">
                            <div class="col-lg-4 col-md-5">
                                <div class="slider-product-image d-none d-md-block">
                                    <img src="{{asset('storage/sliders/'.$slider->image)}}" alt="Slider">
                                    <div class="slider-discount-tag">
                                        <p><a class="" href="#">Réserver</a></p>
                                    </div>
                                </div> <!-- slider product image -->
                            </div>
                            <div class="col-lg-8 col-md-7">
                                <div class="slider-product-content">
                                    <h4 class="slider-title mb-10" data-animation="fadeInUp" data-delay="0.3s"><span>{{$slider->title}}</span></h4>
                                    <p class="mb-25" data-animation="fadeInUp" data-delay="0.9s">{{$slider->subtitle}}</p>
                                    <a class="main-btn" href="{{ url('rooms')}}" data-animation="fadeInUp" data-delay="1.5s">Plus... <i class="lni-chevron-right"></i></a>
                                </div> <!-- slider product content -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- container -->
                </div> <!-- single slider -->
                @endforeach
            </div> <!-- slider active -->
            <div class="slider-social">
                <div class="row justify-content-end">
                    <div class="col-lg-7 col-md-6">
                        <ul class="social text-right">
                            <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                            <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                            <li><a href="#"><i class="lni-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- container fluid -->
    </section>
    
    <!--====== SLIDER PART ENDS ======-->
   
    <!--====== DISCOUNT PRODUCT PART START ======-->
    
    <section id="discount-product" class="discount-product pt-100">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-discount-product mt-30">
                        <div class="product-image">
                            <img src="{{asset('storage/news/'.$news->image)}}" alt="News">
                        </div>
                        
                        <div class="product-content">
                            <h4 class="content-title mb-15">{{$news->title}}<br></h4>
                            <p>
                                Le {{ \Carbon\Carbon::parse($news->created_at)->format('d/m/Y') }}
                            </p>
                            <a href="{{ url('news')}}">Voir Plus... <i class="lni-chevron-right"></i></a>
                        </div>
                    </div>
                    <div>
                        {{$news->description}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-discount-product mt-30">
                        <div class="product-image">
                            <img src="{{asset('storage/events/'.$eventz->image)}}" alt="Events">
                        </div> <!-- product image -->
                        <div class="product-content">
                            <h4 class="content-title mb-15">{{$eventz->title}} <br></h4>
                            <a href="{{ url('events')}}">Voir Plus.. <i class="lni-chevron-right"></i></a>
                        </div> <!-- product content -->
                    </div> <!-- single discount product -->
                    <div>
                    Le {{ \Carbon\Carbon::parse($eventz->date)->format('d/m/Y') }}   {{$eventz->time}}
                    <div>
                        {{$eventz->description}}
                    </div>
                </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== DISCOUNT PRODUCT PART ENDS ======-->
   
    <!--====== PRODUCT PART START ======-->
    
    <section id="product" class="product-area pt-100 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="collection-menu text-center mt-30">
                        <h4 class="collection-tilte">SERVICES</h4>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="active" id="v-pills-furniture-tab" data-toggle="pill" href="#v-pills-furniture" role="tab" aria-controls="v-pills-furniture" aria-selected="true">Salle de Réunion</a>
                            
                            <a id="v-pills-decorative-tab" data-toggle="pill" href="#v-pills-decorative" role="tab" aria-controls="v-pills-decorative" aria-selected="false">Hébergement</a>
                            
                            <a id="v-pills-lighting-tab" data-toggle="pill" href="#v-pills-lighting" role="tab" aria-controls="v-pills-lighting" aria-selected="false">Restaurant</a>
                            
                            <a id="v-pills-outdoor-tab" data-toggle="pill" href="#v-pills-outdoor" role="tab" aria-controls="v-pills-outdoor" aria-selected="false">Bar</a>
                            
                            <a id="v-pills-storage-tab" data-toggle="pill" href="#v-pills-storage" role="tab" aria-controls="v-pills-storage" aria-selected="false">Sauna</a>
                        </div> <!-- nav -->
                    </div> <!-- collection menu -->
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-furniture" role="tabpanel" aria-labelledby="v-pills-furniture-tab">
                            <div class="product-items mt-30">
                                <div class="row product-items-active">
                                  @foreach($rooms as $room)
                                    <div class="col-md-4">
                                        <div class="single-product-items">
                                            <div class="product-item-image">
                                                <a href="{{ url('rooms')}}"><img src="{{asset('storage/rooms/'.$room->image)}}" alt="Rooms" id="room"></a>
                                               <!-- <div class="product-discount-tag">
                                                    <p>20%</p>
                                                </div>
                                            -->
                                            </div>
                                            <div class="product-item-content text-center mt-30">
                                                <h5 class="product-title"><a href="#">{{ $room->category->name}}</a></h5>
                                                <ul class="rating">
                                                    <li><i class="lni-star-filled"></i></li>
                                                    <li><i class="lni-star-filled"></i></li>
                                                    <li><i class="lni-star-filled"></i></li>
                                                    <li><i class="lni-star-filled"></i></li>
                                                </ul>
                                                <span>{{ $room->description}}</span>
                                                <span class="regular-price">{{ number_format($room->category->price,0,',','.')}} FBU</span>
                                                <span class="discount-price">{{ number_format($room->category->discount_price,0,',','.')}} FBU</span>
                                            </div>
                                        </div> <!-- single product items -->
                                    </div>
                                    @endforeach
                                    
                            </div> 
                        </div> <!-- tab pane -->
                    </div> 
                </div>
            </div> <!-- row -->
        </div> 
    </section>
    
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
                            <img src="{{asset('storage/restaurations/'.$restaurationz->image)}}" alt="">
                            <a href="{{ url('restaurations')}}" class="main-btn mt-30">Plus... <i class="lni-chevron-right"></i></a>
                        </div> <!-- services btn -->
                    </div> <!-- services left -->
                </div>
                <div class="col-lg-6">
                    
                    <div class="services-right mt-45" id="service">
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
                                </div> 
                            </div>
                        </div> 
                    </div> 
                </div>
            </div> 
        </div> 
    </section>
    
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
                            <img src="{{asset('storage/gallery/'.$image->meta_value)}}" alt="Testimonial">
                            <a href="{{ url('gallery')}}" class="main-btn">Tout voir</a>
                        </div> 
                      @endforeach
                    </div> 
                </div>
            </div> <!-- row -->
        </div> 
    </section>

    
    <section id="team" class="team-area pt-125 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-25">
                        <h3 class="title mb-15">Nos Employés</h3>
                        <p id="employee">Nous respectons nos employés, nous reconnaissons leur valeur et nous favorisons une culture qui leur permet  d’avoir une véritable influence au quotidien.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="single-temp text-center mt-30">
                        <div class="team-image">
                            <img src="{{asset('images/undraw_team.svg')}}"
                             alt="employee">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="single-temp text-center mt-30">
                        <div class="team-image">
                            <img src="{{asset('images/undraw_chef.svg')}}"
                             alt="employee">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="single-temp text-center mt-30">
                        <div class="team-image">
                            <img src="{{asset('images/undraw_business.svg')}}"
                             alt="employee">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="single-temp text-center mt-30">
                        <div class="team-image">
                            <img src="{{asset('images/undraw_Modern.svg')}}"
                             alt="employee">
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section>
    
    <section id="testimonial" class="testimonial-area pt-200">
        <div class="testimonial-bg bg_cover" style="background-image: url(assets/images/testimonial/ts-bg.jpg)"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-8">
                    <div class="testimonial-content">
                        <div class="testimonial-active">
                            @foreach($pointKeys as $pointKey)
                            <div class="single-testimonial">
                                <i class="lni-quotation"></i>
                                <p class="mb-30">{{$pointKey->description}}</p>
                                <span>{{$pointKey->title}}</span>
                            </div> 
                            @endforeach
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-7 col-md-4">
                    <div class="testimonial-play text-right d-none d-md-block">
                        <a class="Video-popup" href="https://www.youtube.com/watch?v=45WJnzJdnbo"><i class="lni-play"></i></a>
                    </div> 
                </div>
            </div> <!-- row -->
        </div> 
    </section>
    
    <section id="blog" class="blog-area pt-125">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-25">
                        <h3 class="title mb-15">Les Evénements</h3>
                        <p>L’hôtel est un lieu de référence reconnu pour l’organisation de réunions, conférences, dîners et autres événements. L’Hôtel dispose de 5 salles de réunions et 3 paillottes pouvant accueillir de 10 à un maximum de 600 personnes pour des réunions et jusqu’à 1000 pour les événements.<br><br><br><br>

Notre équipe du service commercial est toujours disponible pour vous conseiller dans la planification de vos réunions et vous offrir un soutien personnalisé en veillant à ce que vos réunions deviennent une véritable réussite.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                @foreach($events as $event)
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog mt-30">
                        <div class="blog-image">
                            <img src="{{asset('storage/events/'.$event->image)}}" alt="Event">
                        </div>
                        <div class="blog-content">
                            <div class="content">
                                <h4 class="title"><a href="{{ url('events')}}">{{$event->title}}</a></h4>
                                <span>Le {{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</span>
                            </div>
                            <div class="meta d-flex justify-content-between align-items-center">
                                <div class="meta-admin d-flex align-items-center">
                                    <div class="image">
                                        <a href="#"><img src="assets/images/blog/amba.jpg" alt="Admin"></a>
                                    </div>
                                    <div class="admin-title">
                                        <h6 class="title"><a href="#">Ambaza M.</a></h6>
                                    </div>
                                </div>  <!-- meta admin -->
                                <div class="meta-icon">
                                    <ul>
                                        <li><a href="#"><i class="lni-share"></i></a></li>
                                        <li><a href="#"><i class="lni-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div> 
                        </div>
                    </div> 
                </div>
                @endforeach    
        </div> 
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
                            <form id="contact-form" action="{{route('site.contact_us_form')}}" method="post" data-toggle="validator">
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
                                            <textarea id="contact-us" name="message" placeholder="Entrer votre message" data-error="Please,leave us a message." required="required"></textarea>
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
                                <li><a href="#room">Hébergement</a></li>
                                <li><a href="#service">Restaurant</a></li>
                                <li><a href="#service">Bar</a></li>
                                <li><a href="#service">Salle de réunion</a></li>
                                <li><a href="#service">Sauna</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-5">
                        <div class="footer-link mt-50">
                            <h5 class="f-title">Aide</h5>
                            <ul>
                                <li><a href="#employee">Employés</a></li>
                                <li><a href="#room">Chambres</a></li>
                                <li><a href="#">Centre d'aide</a></li>
                                <li><a href="#contact-us">Contactez-nous</a></li>
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
