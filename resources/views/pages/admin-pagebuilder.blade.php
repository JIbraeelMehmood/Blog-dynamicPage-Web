<!DOCTYPE html>
<html lang="en">

<head>
@foreach($page as $key=> $pageD)
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="LaraSnap | Laravel Admin Dashboard">
    <meta name="author" content="Karthick Sivakumar">
    <meta name="csrf-token" content="{ csrf_token( }" />
    <title> {{ $pageD->page_name }} |</title>
   <!-- Custom fonts for this template-->
   <!-- Custom styles for this template-->
@endforeach

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ============================================================================ -->
    <style>
      body {
          margin: 0;
          padding-top: 40px;
          color: #2e323c;
          background: #f5f6fa;
          position: relative;
          height: 100%;
      }

      .account-settings .user-profile {
          margin: 0 0 1rem 0;
          padding-bottom: 1rem;
          text-align: center;
      }

      .account-settings .user-profile .user-avatar {
          margin: 0 0 1rem 0;
      }

      .account-settings .user-profile .user-avatar img {
          width: 90px;
          height: 90px;
          -webkit-border-radius: 100px;
          -moz-border-radius: 100px;
          border-radius: 100px;
      }

      .account-settings .user-profile h5.user-name {
          margin: 0 0 0.5rem 0;
      }

      .account-settings .user-profile h6.user-email {
          margin: 0;
          font-size: 0.8rem;
          font-weight: 400;
          color: #9fa8b9;
      }

      .account-settings .about {
          margin: 2rem 0 0 0;
          text-align: center;
      }

      .account-settings .about h5 {
          margin: 0 0 15px 0;
          color: #007ae1;
      }

      .account-settings .about p {
          font-size: 0.825rem;
      }

      .form-control {
          border: 1px solid #cfd1d8;
          -webkit-border-radius: 2px;
          -moz-border-radius: 2px;
          border-radius: 2px;
          font-size: .825rem;
          background: #ffffff;
          color: #2e323c;
      }

      .card {
          background: #ffffff;
          -webkit-border-radius: 5px;
          -moz-border-radius: 5px;
          border-radius: 5px;
          border: 0;
          margin-bottom: 1rem;
      }
    </style>
    <!-- ============================================================================ -->
</head>

<body>
    <?php

        #echo '<br>'; echo '<br>'; echo '<br>';
        //foreach( $section as $key=> $value):
                //print_r($value);
        //endforeach;
        #echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>';
        #print_r($section[0]);
        #foreach($section[0] as $ids)
        #{           
          #  echo '<br>';            echo '--------------------------';            echo '<br>';            echo '<br>';
          #  print_r($ids);
          #  echo '<br>';
          #  echo '<br>';
          #  print_r($ids->elements);
        #}
        #echo '<br>'; echo '<br>'; echo '<br>';
        #print_r($section[1]);
        
      //foreach( $section as $key=> $value):
          //print_r($value);
          //echo '<br>';
          //echo '<br>';
          //print_r($value[0]->id);
          //print_r(json_decode($value,true) );

          //+ $value['id']
         //echo 'element details' ;
         //echo '<br>';
      //endforeach;
      #exit();

        //print_r($section->elements);

        //print_r(json_decode($page));
        //$elementArray =json_decode($post->elements,true);
        #exit();
        //
    ?>

    <?php
          #print_r($section);
          #echo '<br>';
          #echo '<br>';
          #echo '<br>';
          #$arrayPage=json_decode($page,true);
          #print_r($arrayPage);
          //print_r($arrayPage[1]->id);
          #exit();
      foreach( $page as $key=> $value):
        $arrayPage=json_decode($value,true);
        //print_r($arrayPage['id']);
        //print_r($arrayPage->id);
      endforeach;

     // exit();
    ?>

    <!-- ============================================================================ -->
    <section>
        <div class="container">
            <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile">
                                <div class="user-avatar">
                                        <img src="{{ $arrayPage['page_favicon'] }}"
                                            alt="Maxwell Admin">
                                    </div>
<?php  
    foreach( $page as $key=> $value):
      $arrayPage=json_decode($value,true);
    endforeach;
?>
                                    <h5 class="user-name">{{ $arrayPage['page_name'] }}</h5>
                                    <h6 class="user-email">{{ $arrayPage['page_title'] }}</h6>
                                </div>
                                <div class="about">
                                    <h5>About</h5>
                                    <p>{{ $arrayPage['page_desc'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
@foreach($section as $byparts=> $byorder)
<?php
    #print_r($byorder);
    //exit();
    #echo '<br>';    echo '<br>';
    #echo '<br>';    echo '<br>';
?>
                            <div class="row gutters ">
@foreach($byorder as $ids=> $use)
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">{{ $use->sections_name }}</h6>
                                </div>
<?php
    //print_r($use);
    #print_r(json_decode($use->elements,true));
    $allelements =json_decode($use->elements,true);
    //exit();
    #echo '<br>';    echo '<br>';
    #echo '<br>';    echo '<br>';
?>
@foreach($allelements as $useElements=> $value)
<?php
    #print_r($values);
    #exit();
?>
<!-- =================================================================================== -->
                            <!--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 ">
                                    <div class="form-group">
                                        <label for="fullName"> <?php echo $value['label'] ?> </label>
                                       <input class="form-control"  placeholder="Enter full name" type="<?php echo $value['elements'] ?>" name="<?php echo $value['name'] ?>" id="<?php echo $value['name'] ?>" value="<?php echo $value['label'] ?>" />
                                      </div>
                            </div>-->

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 ">
        <div class="form-group">   
<?php           
            if ($value['elements']=='textarea') 
                {
?>
                    <label><?php echo $value['label'] ?>:</label>
                    <br>
                    <textarea placeholder="<?php echo $value['label'] ?>" name="<?php echo $value['name'] ?>" rows="5" cols="40"></textarea>
                    <br>
<?php 
                }
            elseif ($value['elements']=='checkbox') 
                {   
                    $count=1;
?>
                    <label><?php echo $value['label'] ?>:</label>
                    <br>
<?php             
                    //$count = $value['noOFcheckBox'] || $value['noOFradioBtn'];
                    //$count = [$value['noOFcheckBox'] , $value['noOFradioBtn']];
                    for ($x = 0; $x <= $value['noOFcheckBox']; $x++) 
                    {
?>
                        <input type="<?php echo $value['elements'] ?>" name="<?php echo $value['name'].'_'.$count ?>"  value="<?php echo $value['label'] ?>"/>
                        &nbsp;&nbsp;
<?php 
                        $count++;
                    } 
                    echo '<br>';
                }
            elseif ( $value['elements']=='radio') 
                {   
?>
                <label><?php echo $value['label'] ?>:</label>
                <br>
<?php             
                    for ($x = 0; $x < $value['noOFradioBtn']; $x++) 
                    {
?>
                        <input type="<?php echo $value['elements'] ?>" name="<?php echo $value['name'] ?>"  value="<?php echo $value['label'] ?>"/>
                        &nbsp;&nbsp;
<?php 
                    } 
                    echo '<br>';
                }             
            elseif ($value['elements']=='submit') 
                {
?>
                    <label><?php echo $value['label'] ?>:</label>
                    <br>
                        <a class=" btn btn-dark text-info " name="<?php echo $value['name'] ?>"  href="<?php echo $value['btnurl'] ?>">
                            &nbsp; {{ $value['label'] }}
                        </a>
<?php 
                    echo '<br>';
                }
            else
                {  
?>
                    <label><?php echo $value['label'] ?>:</label>
                    <br>
                    <input class="form-control"  placeholder="<?php echo $value['label'] ?>" type="<?php echo $value['elements'] ?>" name="<?php echo $value['name'] ?>" id="<?php echo $value['name'] ?>" />
                    <br>
<?php 
                }  
?>
        </div>
        </div>
<!-- =================================================================================== -->
@endforeach
@endforeach
                            </div>
@endforeach

<!-- ========================================================================== -->
                        </div>
                    </div>
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