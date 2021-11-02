<!-- <html>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" /> 
        <style type="text/css">

        </style>
    </head>

    <body>
        <div class="container ">
-->
@extends('layouts.app')
@section('content')
            <div class="m-3 w-25">
                <a class="font dropdown-item view_project text-dark " href="{{ url('/admin/built-page') }}"data-id="<?php echo 'id' ?>">
                    <i class="fas fa-eye"></i>&nbsp; Page Builder
                </a>
            </div>
        <div class="row m-3">
            <div class="col-8  bg-light" >
                <br>
            <p class="title" style="text-align: center; font-weight: 600; font-size: 20px;" id="">Add Session</p>
<!-- ========================================================================================= -->
        <form class="pb-5 mb-5 toggle-form" action="{{ route('builtsection') }}" method="post"
            enctype="multipart/form-data" name="section_form" id="section_form">
            @csrf
<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
                <div class="table-responsive m-1">  
                    <table class="table table-bordered" id="dynamic_field"> 
<!-- ------------------------------------------------------------------------------------------- -->
                        <div class="fw-bolder mt-2">Session Name</div>
                            <div class="text-gray-600">
                                <input maxlength="30" placeholder=" Enter Session Name"  class="sectionName p-0 bg-light form-control @error('sectionName') is-invalid @enderror"  value="{{ old('sectionName') }}" required autocomplete="sectionName" autofocus  id="sectionName" name="sectionName">
                            </div>
<!-- ------------------------------------------------------------------------------------------- -->
                        <tr>  
                            <td>
                                <div class="fw-bolder mt-2"> Chouse Element </div>
                                <div class="text-gray-600">
                                    <select name="elements[]" placeholder=" Enter Session Element" id="element_1" class="p-1 bg-light form-control element">
                                        <option value="text">Text</option>
                                        <option value="email">Email</option>
                                        <option value="number">Number</option>
                                        <option value="password">Password</option>
                                        <option value="file">Image / File</option>
                                        <option value="checkbox">Cheack Box</option>
                                        <option value="radio">Radio Button</option>
                                        <option value="textarea">Text Area</option>
                                        <option value="search">Search</option>
                                        <option value="color">Color</option>
                                        <option value="submit">Button</option>
                                    </select>
                                </div>
                            </td>
<!-- ------------------------------------------------------------------------------------------- -->
                            <td>
                                <div class="fw-bolder mt-2"> Element Label</div>
                                <div class="text-gray-600">
                                    <input type="text" maxlength="20"  style="text-transform:lowercase"  placeholder=" Enter Session Label" class="label p-1 bg-light form-control  @error('label') is-invalid @enderror"  value="{{ old('label') }}" required autocomplete="label" autofocus  group_id="1"  name="label[]">
                                </div>
                            </td>  
<!-- ------------------------------------------------------------------------------------------- -->
                            <td>
                                <div class="fw-bolder mt-2"> Element Name</div>
                                <div class="text-gray-600">
                                    <input type="text" maxlength="25"  placeholder=" Enter Element Name" class="ename p-1 bg-light form-control  @error('name') is-invalid @enderror"  value="{{ old('name') }}" required autocomplete="name" autofocus   id="name_1" name="name[]">
                                </div>
                            </td> 
                            <td>
                                <div class="fw-bolder mt-2"> Sub Options</div>
                                <div class="text-gray-600">
                                    <div class="text-gray-600">
                                        <input type="number" maxlength="10"  style="display: none;"  placeholder="Number of Check Box " noOFcheckBox_group_id="1" class="p-1 bg-light form-control noOFcheckBox " id="noOFcheckBox" name="noOFcheckBox" >
                                        <input type="number" maxlength="10"  style="display: none;"  placeholder="Number of Radio Btn " noOFradioBtn_group_id="1" class="p-1 bg-light form-control noOFradioBtn"  id="noOFradioBtn" name="noOFradioBtn" >
                                        <input type="text"   style="display: none;"   placeholder="Write Button URL " btnurl_group_id="1" class="p-1 bg-light form-control btnurl_"  id="btnurl_element_1" name="btnurl[]" >
                                    </div>                               
                                </div>
                            </td> 
<!-- ------------------------------------------------------------------------------------------- -->
<br> <br>
                                <button type="button" name="add" id="add" class="btn btn-primary btn-sm">
                                    Add More
                                </button>
                        </tr>  
<!-- ------------------------------------------------------------------------------------------- -->
                    </table>  
                   
                         <button id="submit" type="submit" class="bg-dark text-light input-group-text float-end" name="submit ">
                            Save
                        </button>
                </div>
        </form>
<!-- ======================================================================================= -->
            </div>
            <div class="col-4">
    <div class="card" style="width:400px">
        <div class="card-body bg-light">
<?php 
                if(isset($elementsCombination) && $elementsCombination!='' )
                {
                    #print_r($elementsCombination);
                    #exit();
                    foreach( $elementsCombination as $key=> $value):
                    #print_r($value);
                    #exit();
?>
<?php           
            if ($value['elements']=='textarea') 
                {
?>
                    <label><?php echo $value['label'] ?>:</label>
                    <br>
                    <textarea name="<?php echo $value['name'] ?>" rows="5" cols="40"><?php echo $value['label'] ?></textarea>
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
                    <input type="<?php echo $value['elements'] ?>" name="<?php echo $value['name'] ?>" value="<?php echo $value['label'] ?>" />
                    <br>
<?php 
                }  
                    endforeach;
                }
?>
                    </div>
                </div>
            </div>
         </div>
        @endsection
   <!-- </div> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>

        $(document).ready(function() {
            var postURL = "<?php echo url('/portal/builtsection'); ?>";
            var i = 1;

            $('#add').click(function() {
                i++;
                //alert("Field Id..!" + i);
                var lableID="label_"+i;
                var nameID="name_"+i;
                var elementID="element_"+i;

                //+'<input type="number" style="display: none;" placeholder="Number of Check Box "  noOFcheckBox_group_id="'+i+'" class="form-control noOFcheckBox" id="noOFcheckBox" name="noOFcheckBox" >' 
                //+'<input type="number" style="display: none;" placeholder="Number of Radio Btn "  noOFradioBtn_group_id="'+i+'" class="form-control noOFradioBtn" id="noOFradioBtn" name="noOFradioBtn" >'
                
                $('#dynamic_field').append('<tr id="row' + i +
                    '" class="dynamic-added">'
                            +
                            '<td> <div class="fw-bolder mt-2"> Chouse Element </div> <div class="text-gray-600">'     
                            +' <select name="elements[]" placeholder=" Enter Session Element" id="'+elementID+'"  class="p-1 bg-light  form-control element">'
                            +'<option value="text">Text</option><option value="email">Email</option><option value="number">Number</option> <option value="password">Password</option><option value="file">Image / File</option><option value="checkbox">Cheack Box</option><option value="radio">Radio Button</option><option value="textarea">Text Area</option><option value="search">Search</option><option value="color">Color</option><option value="submit">Button</option></select>'
                            +'<div class="text-gray-600">'
                            +'</div></div></td>'                            
                            +'<td><div class="fw-bolder mt-2"> Element Label</div><div class="text-gray-600">'
                            +' <input type="text" maxlength="20" group_id="'+i+'"  placeholder=" Enter Session Label" class="label p-1 bg-light  form-control  @error('label') is-invalid @enderror"  value="{{ old('label') }}" required autocomplete="label" autofocus  id="'+lableID+'"  name="label[]">'
                            +'</div></td>'
                            +'<td><div class="fw-bolder mt-2"> Element Name</div><div class="text-gray-600">'
                            +'<input type="text" maxlength="25"  placeholder=" Enter Element Name" class="ename p-1 bg-light form-control  @error('name') is-invalid @enderror"  value="{{ old('name') }}" required autocomplete="name" autofocus  id="'+nameID+'" name="name[]">'
                            +'</div></td>' 
                            +'<td><input type="text" style="display: none;"   placeholder="Write Button URL " btnurl_group_id="'+i+'"  class="p-1 bg-light form-control btnurl_"  id="btnurl_element_'+i+'" name="btnurl[]" ></td>'
                            +'<td><button type="button" name="remove" id="'
                            + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                //-----------------------------------------------------------------------
                $('.label,.sectionName').bind('input', function() 
                    {
                        var c = this.selectionStart,
                            r = /[^a-z0-9 .]/gi,
                            v = $(this).val();
                            if(r.test(v)) 
                            {
                                $(this).val(v.replace(r, ''));
                                c--;
                            }
                            this.setSelectionRange(c, c);
                        });
            });
                //alert("label field id..!" + lableID);
                $(document).on('keyup keypress blur','.label',function()
                    //$('.label').bind('keyup keypress blur', function() 
                    {  
                        var myStr = $(this).val();
                        var groupID = $(this).attr('group_id');
                        myStr=myStr.toLowerCase();
                        //myStr=myStr.replace(/(\s+$)/,"");
                        myStr=myStr.replace(/(^\s+|[^a-zA-Z0-9 ]+|\s+$)/g,"");
                        myStr=myStr.replace(/\s+/g, "_");
                        //console.log('#name_'+groupID);
                        $('#name_'+groupID).val(myStr); 
                    });

                    $(document).on('keyup keypress blur','.btnurl_',function()
                    {  
                        var myStr = $(this).val();
                        var groupID = $(this).attr('id');
                        myStr=myStr.toLowerCase();
                        myStr=myStr.replace(/\s+/g, "/");
                        $('#'+groupID).val(myStr); 
                    });


//-----------------------------------------------------------------------
                $(document).on('click', '.btn_remove', function() {
                    var button_id = $(this).attr("id");
                    $('#row' + button_id + '').remove();
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $('#submit').click(function() {
                $.ajax({
                    url: postURL,
                    method: "POST",
                    data: $('#section_form').serialize(),
                    type: 'json',
                    success: function(data) {
                        if (data.error) {
                            printErrorMsg(data.error);
                        } else {
                            i = 1;
                            $('.dynamic-added').remove();
                            $('#section_form')[0].reset();
                            $(".print-success-msg").find("ul").html('');
                            $(".print-success-msg").css('display', 'block');
                            $(".print-error-msg").css('display', 'none');
                            $(".print-success-msg").find("ul").append(
                                '<li>Record Inserted Successfully.</li>');
                        }
                    }
                });
            });
//-------------------------------------------------------------------------------------
            $(document).on('click', '.btn_remove', function() 
            {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
                
            });
//-------------------------------------------------------------------------------------
            $(document).on("change", ".element", function() {
                var elementID = $(this).attr('id');
                //alert("Field Id..!" + elementID);
                var changetype = '';
                changetype= $('#'+elementID).find(":selected").text();
                //alert("check BOX select..!" + changetype);

                if (changetype == "Cheack Box") 
                {   
                    //alert("check BOX select..!" + changetype);
                    //var pre = document.getElementById("noOFcheckBox");
                    var pre = document.getElementsByClassName("noOFcheckBox");
                    //alert("no of select box ..!" + pre);
                    //var radioID = $(this).attr('noOFradioBtn_group_id');
                    pre[0].style.display = "block";
                } 
                else if (changetype == "Radio Button") 
                {
                    //alert("radio BTN select..!" + changetype);
                    var pre = document.getElementsByClassName("noOFradioBtn");
                    pre[0].style.display = "block";
                }
                else if (changetype == "Button") 
                {
                    //var pre = document.getElementsByClassName("btnurl_");
                    //var ID = $(pre[0]).attr('id');

                    //var ID = $('.btnurl_').attr('btnurl_group_id');
                    //var elementID = $(this).attr('id');

                    //var elementID = $(this).attr('id');
                    //var ID = document.getElementById("btnurl_"+elementID);

                    //$getID=pre[pre.length-1].getAttribute('btnurl_group_id');
                    //console.log($getID);

                    //alert("every btn have different..!" + ID);

                    var pre = "btnurl_"+elementID ;
                    var ID = document.getElementById(pre);
                    ID.style.display = "block";
                }  
                //else{
                    //var pre1 = document.getElementById("noOFcheckBox");
                    //var pre2 = document.getElementById("noOFradioBtn");
                    //var pre1 = document.getElementsByClassName("noOFcheckBox");
                    //var pre2 = document.getElementsByClassName("noOFradioBtn");
                    //pre1[0].style.display = "block";
                    //pre2[0].style.display = "block";
                //}
        });
//-------------------------------------------------------------------------------------
            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $(".print-success-msg").css('display', 'none');
                $.each(msg, function(key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }
        });


    </script>
<!-- </body> </html> -->