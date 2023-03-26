<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type = "text/javascript">
        $(function()
        {
            $('[data-toggle="tooltip"]').tooltip();
            $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
                $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
            });
            $('.side-nav .collapse').on("show.bs.collapse", function() {                        
                $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
            });
        })    
    </script>
    <link rel = "stylesheet" href = "css\style_.css">
</head>
<body>
    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">User Dashboard</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                    </a>
                </li>            
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">User Dashboard<b class="fa fa-angle-down"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                        <li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                        <li class="divider"></li>
                        <li><a href = "db.php?logout" class="fa fa-power-off"> Logout</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="#"><i class="fa fa-book"></i> Dashboard </a>
                    </li>
                    <li>
                        <a href = "db.php?profile" name = "viewprofile">Profile</a>
                    </li>               
                    <li>
                        <a href = "db.php?main" name = "main">Main page</a>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#submenu-6"><i class="fa fa-comment"></i> Message<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                        <ul id="submenu-6" class="collapse">
                            <li><a href="db.php?compose"><i class="fa fa-angle-double-right"></i>Compose</a></li>
                            <li><a href="db.php?inbox"><i class="fa fa-angle-double-right"></i>Inbox</a></li>
                            <li><a href="db.php?sent"><i class="fa fa-angle-double-right"></i>Sent</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href = "#">Notification</a>
                    </li>
                    <li>
                        <a href = "db.php?logout" class="fa fa-power-off"> Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row" id="main" >
                    <div class="col-sm-12 col-md-12 well" id="content">
