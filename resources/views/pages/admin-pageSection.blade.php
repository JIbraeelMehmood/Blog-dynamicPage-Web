<html>

<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="{{ asset('assets/css/sidebarstyles.css') }}" rel="stylesheet">

    <style type="text/css">
    .hidden 
    {
        display: none;
    }
    .background
    {
        background-image: url('/assets/images/2.jpg');
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
        width: 100%;  
    }
    </style>
</head>

<body class="layout-fixed  layout-footer-fixed background">
    <?php 
        #print_r($post);
        #echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>';
        #print_r($post->name);
        #print_r($post->id);
        #echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; 
        #print_r(json_decode($post->elements,true) );
        #echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>';
        #print_r($post->elements);
        #echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>';
        #exit();
?>
    <nav class="navbar navbar-dark  navbar-expand-md">
                <a class="navbar-brand" href="{{ url('') }}">
                    <!-- {{ config('app.name', 'BLOG') }} -->
                    <span>BLOG</span>
                </a>        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="navbar-nav">
                @foreach($page_use as $key=> $use)
                    <li class="nav-item"><a href="{{ $use->page_name }}" class="nav-link">{{ $use->page_name }}</a></li>
                @endforeach
            </ul>
        </div>
    </nav>
    <div class="container-fluid ">
        <br>
        <div class="row">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            @isset($allSection)
            <!--  col-lg-3 col-md-6 col-12  -->
            <div class="col-8 mb-5">
                <h3> Select Section</h3>
                <div class="row  mt-3">
                    @foreach($allSection as $key=> $post)
                    <div class="col-4 ">
                        <div class="card bg-light"
                            style="box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 1px, rgba(0, 0, 0, 0.25) 0px 1px 1px;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 ">
                                        <div class="row justify-content-start">
                                            <h6 class="col-8 p-0 m-0 fw-bolder ">
                                                {{ $post->name }}
                                            </h6>
                                            <div class="col-2 justify-content-end">
                                                <a class="font   text-danger"
                                                    href="page/section-delete/{{ $post->id }}">
                                                    <i class="fas fa-trash"></i>&nbsp;
                                                </a>
                                            </div>

                                            <div class="col-2 justify-content-end ">
                                               <!-- <a class="font   text-dark" href="page/builder/{{ $post->id }}">
                                                    <i class="fas fa-upload"></i>&nbsp;
                                                </a> -->
                                                <input type="checkbox" name='txtChecked[]' id="selectedlang" value="{{ $post->id }}">
                                            </div>
                                            <button id="btn_{{ $post->id }}"
                                                class="mb-2 btn btn-dark btn-sm toggle">Details</button>
                                        </div>
                                        <div class=" mb-1">
                                            <?php
                                                #print_r(json_decode($post->elements,true) );
                                                $elementArray =json_decode($post->elements,true);
                                                #exit();
                                            ?>
                                            <!-- <br>Session Details:<br> -->
                                            <div id="details_btn_{{ $post->id }}" class=" bg-secondary ">
                                                @foreach($elementArray as $key=> $element)
                                                <label class="m-1" style="color:whitesmoke;">
                                                    {{ ++$key }}. <?php echo $element['label'] ?>:
                                                </label>
                                                <br>
                                                <!--
                                            <p>
                                                <?php
                                                    #print_r($element); #exit();
                                                ?>
                                                <?php           
                                                    if ($element['elements']=='textarea') 
                                                        {
                                                ?>
                                                    <label><?php echo $element['label'] ?>:</label>
                                                        <br>
                                                    <textarea name="<?php echo $element['name'] ?>" rows="5" cols="40">.. .. .. ..!!!
                                                    </textarea>
                                                        <br>
                                                <?php 
                                                        }
                                                    else
                                                        {   
                                                ?>
                                                    <label  class="more" id="more_{{$post->id}}" style="color:rgb(182, 28, 28);" >
                                                        <?php echo $element['label'] ?>:</label>
                                                        <br>
                                                    <input type="<?php echo $element['elements'] ?>" name="<?php echo $element['name'] ?>" value="<?php echo $element['name'] ?>" />
                                                <?php 
                                                        }   
                                                ?>
                                            </p>
                                        -->
                                                @endforeach
                                            </div>
                                        </div>
                                        <div style="font-size: 13px;" class="row mb-1">
                                            <p class="col-sm-6 p-0 m-0 text-dark">Publish Date:</p>
                                            <p class="col-sm-6 p-0 m-0">
                                                <!-- H:i:s -->
                                                <b> {{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d')}} </b>
                                            </p>
                                        </div>
                                        <div style="font-size: 13px;" class="row mb-1">
                                            <p class="col-sm-6 text-dark p-0 m-0">Last Update:</p>
                                            <p class="col-sm-6 p-0 m-0">
                                                <b> {{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d')}} </b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- -------------------------------------------------------------------------- -->
            <div class="col-sm-4 ">
                <h3> Page SEO </h3>
                <div class="card bg-light mt-3" style="box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 1px, rgba(0, 0, 0, 0.25) 0px 1px 1px;">
                    <div class="card-body">

                        <form id="" class="pb-5 mb-5 " action="{{ route('pagebuilder') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="pb-5 fs-6">
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">PageName</div>
                                <div class="text-gray-600">
                                    <div class="selectContainer">
                                        <select name="pagename" id="theSelect" class=" form-control">
                                            <option value="Profile">Profile</option>
                                            <option value="About">About</option>
                                            <option value="Blog">Blog</option>
                                            <option value="Contact">Contact</option>
                                            <option value="Portfolio">Portfolio</option>
                                            <option value="Services">Services</option>
                                            <option value="Terms-of-use">Terms-of-use</option>
                                        </select>
                                    </div>
                                <!--  <div class="hidden isAbout">About <a href="#" class="remove" rel="About">remove</a></div>
                                    <div class="hidden isBlog">Blog <a href="#" class="remove" rel="Blog">remove</a></div>
                                    <div class="hidden isContact">Contact <a href="#" class="remove" rel="Contact">remove</a></div>
                                    <div class="hidden isProfile">Profile <a href="#" class="remove" rel="Profile">remove</a></div>
                                    <div class="hidden isPortfolio">Portfolio <a href="#" class="remove" rel="Portfolio">remove</a></div>
                                    <div class="hidden isServices">Services <a href="#" class="remove" rel="Services">remove</a></div>
                                    <div class="hidden isTerms-of-use">Terms-of-use <a href="#" class="remove" rel="Terms-of-use">remove</a></div>
                                 -->
                                </div>

                                <div class="fw-bolder mt-5">Page Favicon </div>
                                <div class="text-gray-600">
                                    <input type="file" class="form-control" id="" name="favicon" >
                                </div>

                                <div class="fw-bolder mt-5">Page URL</div>
                                <div class="text-gray-600">
                                    <input type="text" class="form-control" id="" name="url" >
                                </div>

                                <div class="fw-bolder mt-5">Title</div>
                                <div class="text-gray-600">
                                    <input type="text" class=" form-control" id="" name="title" max="60">
                                </div>
                                <div class="fw-bolder mt-5">Description</div>
                                <div class="text-gray-600">
                                    <textarea type="text" class=" form-control" id="" name="desc" max="160">
                                    </textarea>
                                </div>
                                <div class="fw-bolder mt-5">Key</div>
                                <div class="text-gray-600">
                                    <input type="text" class=" form-control" id="" name="key" max="300">
                                </div>
                                <div class="fw-bolder mt-5">Section</div>
                                <button style="font-size: 14px;"  class="  btn m-1" type="button" id="formButton">Generate Section!</button>
                                <div class="text-gray-600">
                                    <span class="GFG_DOWN"  id="GFG_DOWN" style="color: black; margin: 5px; font-size: 17px; font-weight: 600;"></span>
                                    <input type="text" style="display: none;"  id="sectionname" class=" form-control GFG_DOWN"  name="section"> 
                                </div>
                                <!--end::Details item-->
                            </div>
                            <button type="submit" class="bg-dark text-light input-group-text float-end" >
                               Save
                            </button>
                        </form>

                    </div>
                </div>
            </div>
            @endisset
        </div>
        <!-- ========================================================== -->

        <!-- ======================================================================================= -->
    </div>
    <!-- ========================================================================================= -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>
    $(".toggle").click(function() {
        var btnID = $(this).attr('id');
        //alert("every btn have different ID..!" + btnID);
        var moreText = "details_" + btnID;
        //alert("every btn have different components..!" + moreText);
        $("#" + moreText).slideToggle("slow");
    });

    // ----------------------------------------
    $('#GFG_UP')
        .text('First check few elements then click on the button.');
        $('button').on('click', function() {
            var array = [];
            $("input:checkbox[id=selectedlang]:checked").each(function() {
                array.push($(this).val());
            });
            $('#GFG_DOWN').text(array);
            var sectionnameval = $("#GFG_DOWN").text();
            //alert(".!" + sectionnameval);
             $('#sectionname').val(sectionnameval);
        });
// -----------------------------------------
/*$("#theSelect").change(function(){          
            var value = $("#theSelect option:selected").val();
            if (value === '') return;
            var theDiv = $(".is" + value);
            
            theDiv.slideDown().removeClass("hidden");
            $("#theSelect option:selected").attr('disabled','disabled');
            $(this).val('');
        });
            
            
        $("div a.remove").click(function () { 
            var value = $(this).attr('rel');
            var theDiv = $(".is" + value);
            
            $("#theSelect option[value=" + value + "]").removeAttr('disabled');
            
            $(this).parent().slideUp(function() { $(this).addClass("hidden"); });
        });*/

    </script>

</body>

</html>