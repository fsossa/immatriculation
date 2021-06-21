

<!DOCTYPE html>
<html>
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <title>E-immatriculation</title>
	    <meta name="description" content="">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="robots" content="all,follow">
	    <meta name="csrf-token" content="{{csrf_token()}}">
	    
	    <!-- Bootstrap CSS-->
	    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
	    <!-- Font Awesome CSS-->
	    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
	    <!-- Fontastic Custom icon font-->
	    <link rel="stylesheet" href="{{asset('css/fontastic.css')}}">
	    <!-- Google fonts - Poppins -->
	    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
	    <!-- theme stylesheet-->
	    <link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">
	    <!-- Custom stylesheet - for your changes-->
	    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
	    <!-- Favicon-->
	    <link rel="shortcut icon" href="{{asset('img/logo_conceptiIO.png')}}">
	    <!-- chartjs-->
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js"></script>
  	</head>
  	<body>
	    <div class="page">
	      	<!-- Main Navbar-->
	      	<header class="header">
	        	<nav class="navbar">
	          		<!-- Search Box-->
	          		<div class="search-box">
	            		<button class="dismiss"><i class="icon-close"></i></button>
	            		<form id="searchForm" action="#" role="search">
	              			<input type="search" placeholder="..." class="form-control">
	            		</form>
	          		</div>
		          	<div class="container-fluid">
		            	<div class="navbar-holder d-flex align-items-center justify-content-between">
		              		<!-- Navbar Header-->
		              		<div class="navbar-header">
		                		<!-- Navbar Brand --><a href="/" class="navbar-brand d-none d-sm-inline-block">
		                  		<div class="brand-text d-none d-lg-inline-block"><strong>E-immatriculation</strong></div>
		                  		</a>
		                		<!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
		              		</div>
		              		<!-- Navbar Menu -->
			              	<ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
				                <!-- Search-->
				                <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
				                <!-- Notifications-->
				                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red badge-corner">12</span></a>
				                  	<ul aria-labelledby="notifications" class="dropdown-menu">
					                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
					                        <div class="notification">
					                          	<div class="notification-content"><i class="fa fa-envelope bg-green"></i>You have 6 new messages </div>
					                          	<div class="notification-time"><small>4 minutes ago</small></div>
					                        </div>
					                    </a></li>
					                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
				                        	<div class="notification">
					                          	<div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
					                          	<div class="notification-time"><small>4 minutes ago</small></div>
				                        	</div>
				                        </a></li>
				                    	<li><a rel="nofollow" href="#" class="dropdown-item"> 
				                        	<div class="notification">
				                          		<div class="notification-content"><i class="fa fa-upload bg-orange"></i>Server Rebooted</div>
				                          		<div class="notification-time"><small>4 minutes ago</small></div>
				                        	</div>
				                        </a></li>
				                    	<li><a rel="nofollow" href="#" class="dropdown-item"> 
				                        	<div class="notification">
				                          		<div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
				                          		<div class="notification-time"><small>10 minutes ago</small></div>
				                        	</div>
				                        </a></li>
				                    	<li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a></li>
				                  	</ul>
				                </li>
				                <!-- Messages                        -->
				                <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope-o"></i><span class="badge bg-orange badge-corner">10</span></a>
				                  	<ul aria-labelledby="notifications" class="dropdown-menu">
				                    	<li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
					                        <div class="msg-profile"> <img src="{{asset('img/avatar-1.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
					                        <div class="msg-body">
				                          		<h3 class="h5">Jason Doe</h3><span>Sent You Message</span>
				                        	</div>
				                        </a></li>
					                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
					                        <div class="msg-profile"> <img src="{{asset('img/avatar-2.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
					                        <div class="msg-body">
				                          		<h3 class="h5">Frank Williams</h3><span>Sent You Message</span>
				                        	</div>
				                        </a></li>
					                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
					                        <div class="msg-profile"> <img src="{{asset('img/avatar-3.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
					                        <div class="msg-body">
					                          	<h3 class="h5">Ashley Wood</h3><span>Sent You Message</span>
					                        </div>
					                    </a></li>
					                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>Read all messages   </strong></a></li>
				                  	</ul>
				                </li>
				                <!-- Languages dropdown    -->
				                <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="{{asset('img/flags/16/GB.png')}}" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
				                  	<ul aria-labelledby="languages" class="dropdown-menu">
					                    <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="{{asset('/img/flags/16/DE.png')}}" alt="English" class="mr-2">German</a></li>
					                    <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="{{asset('img/flags/16/FR.png')}}" alt="English" class="mr-2">French</a></li>
				                  	</ul>
				                </li>
				                <!-- Logout    -->
				                <li class="nav-item">
				                	<div class="" >
	                                    <a class="nofollow" href="{{ route('logout') }}" class="nav-link logout"
	                                       onclick="event.preventDefault();
	                                                     document.getElementById('logout-form').submit();">
	                                        <span class="d-none d-sm-inline">Déconnexion</span><i class="fa fa-sign-out"></i>
	                                    </a>

	                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
	                                        @csrf
	                                    </form>
	                                </div><!--a href="login.html" class="nav-link logout"> <span class="d-none d-sm-inline">Déconnexion</span><i class="fa fa-sign-out"></i></a-->
	                            </li>
			              	</ul>
			            </div>
		          	</div>
	        	</nav>
	      	</header>
	      	<div class="page-content d-flex align-items-stretch"> 
	        	<!-- Side Navbar -->
	        	<nav class="side-navbar">
		          	<!-- Sidebar Header-->
		          	<div class="sidebar-header d-flex align-items-center">
			            <div class="avatar"><img src="{{asset('img/avatar-1.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
			            <div class="title">
		              		<h1 class="h4">{{ Auth::user()->name }}</h1>
		              		<p>Administrateur 1</p>
		            	</div>
		          	</div>
		          	<!-- Sidebar Navidation Menus--><span class="heading">Main</span>
		          	<ul class="list-unstyled">
			            <li class="active"><a href="{{ route('home') }}"> <i class="icon-home"></i>Accueil </a></li>
			            <li><a href="{{ route('vehicules.index') }}"> <i class="fa fa-car"></i>Véhicules </a></li>
			            <li><a href="{{ route('clients.index') }}"> <i class="fa fa-users"></i>Clients </a></li>
			            <li><a href="{{ route('modeles.index') }}"> <i class="fa fa-gears"></i>Modeles </a></li>
		            	<li><a href="{{ route('users.index') }}"> <i class="fa fa-star"></i>Utilisateurs </a></li>
		            	<li><a href="{{ route('roles.index') }}"> <i class="fa fa-star"></i>Roles </a></li>
		          	</ul>
		        </nav>
		        <div class="content-inner">
		          
		          	@yield('content')

		          	<!-- Page Footer-->
		          	<footer class="main-footer">
		            	<div class="container-fluid">
		              		<div class="row">
		                		<div class="col-sm-6">
		                  			<p>Conceptic.IO &copy; 2021</p>
		                		</div>
			                	<div class="col-sm-6 text-right">
				                  	<p> <a href="https://conceptic.io" class="external">© Conceptic.IO SARL 2021, tout droit réservés</a></p>
				                  	<!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
			                	</div>
		              		</div>
		            	</div>
		          	</footer>
		        </div>
	      	</div>
	    </div>
	    <!-- JavaScript files-->
	    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
	    <script src="{{asset('vendor/popper.js/umd/popper.min.js')}}"> </script>
	    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	    <script src="{{asset('vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
	    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
	    <script src="{{asset('vendor/jquery-validation/jquery.validate.min.js')}}"></script>
	    <script src="{{asset('js/charts-home.js')}}"></script>
	    <!-- Main File-->
	    <script src="{{asset('js/front.js')}}"></script>
	    <script>
	    	var ctx = document.getElementById('graph1').getContext('2d');
			var graph1 = new Chart(ctx, {
			    type: 'line',
			    data: {
			        labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Juin', 'Mai', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
			        datasets: [{
			            label: 'Véhicules',
			            data: <?php echo json_encode($stat['vehicules_t']); ?>,
			            
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        },{
			            label: 'Validés',
			            data: [10, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3],
			            
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            y: {
			                beginAtZero: true
			            }
			        }
			    }
			});
	    </script>
  	</body>
</html>
