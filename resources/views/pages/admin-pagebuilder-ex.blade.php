<!DOCTYPE html>
<html lang="en">

<head>
@foreach($page as $key=> $pageD)
    <title> {{ $pageD->page_name }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@endforeach

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ============================================================================ -->
    <style>
        body{
            margin-top:20px;
            background:#eee;
        }
        .gradient-brand-color {
            background-image: -webkit-linear-gradient(0deg, #376be6 0%, #6470ef 100%);
            background-image: -ms-linear-gradient(0deg, #376be6 0%, #6470ef 100%);
            color: #fff;
        }
        .contact-info__wrapper {
            overflow: hidden;
            border-radius: .625rem .625rem 0 0
        }

        @media (min-width: 1024px) {
            .contact-info__wrapper {
                border-radius: 0 .625rem .625rem 0;
                padding: 5rem !important
            }
        }
        .contact-info__list span.position-absolute {
            left: 0
        }
        .z-index-101 {
            z-index: 101;
        }
        .list-style--none {
            list-style: none;
        }
        .contact__wrapper {
            background-color: #fff;
            border-radius: 0 0 .625rem .625rem
        }

        @media (min-width: 1024px) {
            .contact__wrapper {
                border-radius: .625rem 0 .625rem .625rem
            }
        }
        @media (min-width: 1024px) {
            .contact-form__wrapper {
                padding: 5rem !important
            }
        }
        .shadow-lg, .shadow-lg--on-hover:hover {
            box-shadow: 0 1rem 3rem rgba(132,138,163,0.1) !important;
        }

    </style>
    <!-- ============================================================================ -->
</head>

<body>
    <!-- ============================================================================ -->
    <section>
        <div class="container">
            <div class="contact__wrapper shadow-lg mt-n9">
                <div class="row no-gutters">
                    <div class="col-lg-5 contact-info__wrapper gradient-brand-color p-5 order-lg-2">
                        <h3 class="color--white mb-5">Get in Touch</h3>
            
                        <ul class="contact-info__list list-style--none position-relative z-index-101">
                            <li class="mb-4 pl-4">
                                <span class="position-absolute"><i class="fas fa-envelope"></i></span> support@bootdey.com
                            </li>
                            <li class="mb-4 pl-4">
                                <span class="position-absolute"><i class="fas fa-phone"></i></span> (021)-241454-545
                            </li>
                            <li class="mb-4 pl-4">
                                <span class="position-absolute"><i class="fas fa-map-marker-alt"></i></span> bootdey Technologies Inc.
                                <br> 2694 Queen City Rainbow Drive
                                <br> Florida 99161
            
                                <div class="mt-3">
                                    <a href="https://www.google.com/maps" target="_blank" class="text-link link--right-icon text-white">Get directions <i class="link__icon fa fa-directions"></i></a>
                                </div>
                            </li>
                        </ul>
            
                        <figure class="figure position-absolute m-0 opacity-06 z-index-100" style="bottom:0; right: 10px">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="444px" height="626px">
                                <defs>
                                    <linearGradient id="PSgrad_1" x1="0%" x2="81.915%" y1="57.358%" y2="0%">
                                        <stop offset="0%" stop-color="rgb(255,255,255)" stop-opacity="1"></stop>
                                        <stop offset="100%" stop-color="rgb(0,54,207)" stop-opacity="0"></stop>
                                    </linearGradient>
            
                                </defs>
                                <path fill-rule="evenodd" opacity="0.302" fill="rgb(72, 155, 248)" d="M816.210,-41.714 L968.999,111.158 L-197.210,1277.998 L-349.998,1125.127 L816.210,-41.714 Z"></path>
                                <path fill="url(#PSgrad_1)" d="M816.210,-41.714 L968.999,111.158 L-197.210,1277.998 L-349.998,1125.127 L816.210,-41.714 Z"></path>
                            </svg>
                        </figure>
                    </div>
                    <div class="col-lg-7 contact-form__wrapper p-5 order-lg-1">
                        <form action="#" class="contact-form form-validate" novalidate="novalidate">
                            <div class="row">
@foreach($section as $byparts=> $byorder) 
@foreach($byorder as $ids=> $use)
<?php
    $allelements =json_decode($use->elements,true);;
?>
@foreach($allelements as $useElements=> $value)

<?php           
if ($value['elements']=='textarea') 
                {
?>
                                <div class="col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label class="required-field" for="message">How can we help?</label>
                                        <textarea  class="form-control" placeholder="<?php echo $value['label'] ?>" name="<?php echo $value['name'] ?>" id="<?php echo $value['name'] ?>" rows="5" cols="40"></textarea>
                                    </div>
                                </div>
<?php 
                }
elseif($value['elements']=='submit') 
                {
?>
                                <div class="col-sm-12 mb-3">
                                    <a class=" btn btn-primary text-light " name="<?php echo $value['name'] ?>"  href="<?php echo $value['btnurl'] ?>">
                                        &nbsp; {{ $value['label'] }}
                                    </a>
                                </div>
<?php 
                }else{
?>
                                <div class="col-sm-6 mb-3">
                                    <div class="form-group">
                                        <label class="required-field" for="firstName"><?php echo $value['label'] ?></label>
                                        <input  class="form-control"  placeholder="<?php echo $value['label'] ?>" type="<?php echo $value['elements'] ?>" name="<?php echo $value['name'] ?>" id="<?php echo $value['name'] ?>" />
                                    </div>
                                </div>
<?php 
                }
?>
@endforeach
@endforeach
@endforeach
                            </div>
                        </form>
                    </div>
                    <!-- End Contact Form Wrapper -->
                </div>
            </div>
        </div>        
    </section>
    <footer>
        <p>Footer</p>
    </footer>
    <!-- ============================================================================ -->
</body>

</html>