<!DOCTYPE html>
<html>
<head>
	<title>@yield('title','Test')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="stock product" />
	<link rel="stylesheet" href={{asset("css/proui/bootstrap.min.css")}}>

    <!-- Related styles of various icon packs and plugins -->
    <link rel="stylesheet" href={{asset("css/proui/plugins.css")}}>

    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href={{asset("css/proui/main.css")}}>

    <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    @yield('css')
    <link rel="stylesheet" href={{asset("css/proui/themes.css")}}>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css">
    <style type="text/css">
        li.paginate_button:hover,li.paginate_button:active,li.paginate_button:link{
            background: none !important;
            border: none!important;
        }
        li.paginate_button:active{
        	background: none !important;
            border: none!important;
        }
    </style>
    <!-- END Stylesheets -->
    
    <!-- Modernizr (browser feature detection library) -->
    <script src={{asset("js/proui/js/vendor/modernizr.min.js")}}></script>
    
</head>
<body>
		<div id="page-wrapper">
			<div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
		    	@include('menus.admin_menu')
		    	
		    	<div id="main-container">
		    		@include('menus.admin_header')
		    			<div id="page-content">
		    				@yield('content')
		    			</div>
		    		@include('menus.admin_footer')
		   		</div>

			</div>
		</div>
	
	<script src={{asset("js/proui/js/vendor/jquery.min.js")}}></script>
    <script src={{asset("js/proui/js/vendor/bootstrap.min.js")}}></script>
    <script src={{asset("js/proui/js/plugins.js")}}></script>
    <script src={{asset("js/proui/js/app.js")}}></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script type="text/javascript">
        function alertOnDelete(nameclass,dataname,token,route){
            $(document).on('click',"a."+nameclass,function(){
                name = $(this).data(dataname);
                swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover this!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN':token
                        }
                    });
                    $.ajax({
                        url: route,
                        type: "post",
                        data: {
                            id: name
                        },
                        dataType: "json",
                        success: function (data) {

                            swal("Done!", "It was succesfully deleted!", "success").then(function(){
                                location.reload();
                            });
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            swal("Error deleting!", "Please try again", "error");
                        }
                    });
                  } else {
                    swal("Your data is safe!");
                  }
                });

            });
        }
    </script>
    @yield('js')

</body>
</html>