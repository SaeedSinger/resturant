<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo getTitle() ?></title>
	<link rel="stylesheet"  href="layout/css/bootstrap.css">
	<link rel="stylesheet"  href="layout/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
	<link rel="stylesheet"  href="layout/css/backend.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
	
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
   <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
</head>
<body>
         <!----------- Start Preloader ---------->
	
			<div class="preloader loaded">
				<div class="preloader-body">
				  <div class="cssload-bell">
					 <div class="cssload-circle">
						<div class="cssload-inner"></div>
					 </div>
					 <div class="cssload-circle">
						<div class="cssload-inner"></div>
					 </div>
					 <div class="cssload-circle">
						<div class="cssload-inner"></div>
					 </div>
					 <div class="cssload-circle">
						<div class="cssload-inner"></div>
					 </div>
					 <div class="cssload-circle">
						<div class="cssload-inner"></div>
					 </div>
				  </div>
				</div>
			 </div>
<!----------- End Preloader ---------->
		
		
<?php

    function getTitle()
    {
        global $pageTitle;
        
        if(isset($pageTitle))
        {
            echo $pageTitle;
        }
        else
        {
            echo 'Default';
        }
        
    }

?>