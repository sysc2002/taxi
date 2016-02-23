<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ad</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/1-col-portfolio.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>


    <script> 
    $(function(){
        $("#navigation").load("navigation.html"); 
        $("#footer").load("footer.html"); 



    var inputLocalFont = document.getElementById("image-input");
    inputLocalFont.addEventListener("change",previewImages,false);

    function previewImages(){
        var fileList = this.files;
        $('.preview-area').empty();
        var anyWindow = window.URL || window.webkitURL;
        var images = "";

            for(var i = 0; i < fileList.length; i++){
              var objectUrl = anyWindow.createObjectURL(fileList[i]);
              images+='<img style="width: 200px;" src="' + objectUrl + '" />';
              window.URL.revokeObjectURL(fileList[i]);
            }

            $('.preview-area').append(images);
    }




    });

    $(document).on('change','#type',function(){
        var type = $("#type").val();
        if (type == "sale"){
            $( "#sale" ).show();
        }else if (type == "job"){
            $( "#sale" ).hide();
        }
    });

    $(document).on('change','#carIncluded',function(){
        var type = $("#carIncluded").val();
        if (type == "yes"){
            $( "#car" ).show();
        }else if (type == "no"){
            $( "#car" ).hide();
        }
    });


    
    </script>

</head>

<body>


    

    <!-- loaded by jquery navigation.html page -->
    <div id="navigation"></div>

    <!-- Page Content -->
    <div class="container">

                <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Post An Ad Free
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <?php require 'action.php';?>
        
        <div class="row">
            <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  enctype="multipart/form-data">
                                        <div class="form-group"  >
                                            <label>Select ad Type</label>
                                            <select  id="type" class="form-control" name="adType">
                                                <option value="sale">Sale</option>
                                                <option value="job">Job</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="Title">
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="4" name="Description"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="Email">
                                        </div>

                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" name="Phone">
                                        </div>

                                        <div class="form-group">
                                                <label>Select Country</label>
                                                <select class="form-control" name="Country">
                                                    <option>United States</option>
                                                    <option>Canada</option>
                                                    <option>United Kingdom</option>
                                                </select>
                                            </div>
                                            <div id="">
                                                    <label>Province/State</label>
                                                    <select class="form-control" name="Province">
                                                        <option>Ontario</option>
                                                        <option>Alberta</option>
                                                        <option>New York</option>
                                                    </select>
                                                    <div class="form-group">
                                                        <label>Postal Code</label>
                                                        <input class="form-control" name="PostalCode">
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label>City</label>
                                                <input class="form-control" name="City">
                                            </div>


                                        <div id="sale">

                                            <div class="form-group" >
                                                <label>License included</label>
                                                <select  class="form-control" name="Licenseincluded">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>

                                            <div class="form-group" >
                                                <label>Car included</label>
                                                <select  id="carIncluded" class="form-control" name="Carincluded">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>

                                            <div id="car">

                                            </div>



                                        </div>


                                        <div class="form-group">
                                            <input type="file" class="dimmy" id="image-input" name="image-input" multiple accept="image/*"  />
                                            <div class="preview-area thumbnail" style="width: 800px; height: 150px;"></div>
                                            
                                        </div>











                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                        
                                    </form>
        </div>
        <!-- /.row -->

        <hr>
      

        <!-- Footer -->
        <div id="footer"></div>

    </div>
    <!-- /.container -->

    

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>