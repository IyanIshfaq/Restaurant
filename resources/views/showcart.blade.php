<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/157630243c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Klassy Cafe - Restaurant HTML Template</title>
    <!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="/redirect/#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="/redirect/#about">About</a></li>

                            <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="/redirect/#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="/redirect/#chefs">Chefs</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="/redirect/#reservation">Contact Us</a></li>

                            @auth
                            <li class="scroll-to-section"><a href="{{url('/showcart',Auth::user()->id)}}"> Cart [{{$count}}] </a></li>
                            @endauth
                            @guest
                            <li class="scroll-to-section"><a href="/redirect/#menu"> Cart [0] </a></li>
                            @endguest





                            <li>
                                @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                            <li>
                                <x-app-layout>

                                </x-app-layout>
                            </li>
                            @else
                            <li> <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>

                            @if (Route::has('register'))
                            <li> <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>

                            @endif
                            @endauth
                </div>
                @endif
                </li>
                </ul>

                <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
        </div>
    </header>


    <div style="position:relative; margin-top: 4%;  right: 0px;">

        <br>
        <br>

        <table class="table table-dark table-striped">
            <tr>
                <th>#id</th>
                <th>Title</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Action</th>



            </tr>
<form action="{{url('orderconfirm')}}" method="post">
    @csrf
            @foreach($data as $data )

            <tr>
                <td>{{$data->id}}</td>
                <td>
                    <input type="text" name="foodname[]" value="{{$data->title}}" hidden>
                    {{$data->title}}
                </td>
                <td>
                    <input type="text" name="price[]" value="{{$data->price}}" hidden>
                    ${{$data->price}}
                </td>
                <td>
                    <input type="text" name="quantity[]" value="{{$data->quantity}}" hidden>
                    {{$data->quantity}}
                </td>
                <td><img width="40px" style="clip-path:circle();" src="/foodimage/{{$data->image}}"> </td>

                <td>
                    <a href="{{url('/remove',$data->id)}}"><i class="fa-solid fa-trash-can"></i></a>

                </td>
            </tr>

            @endforeach

        </table>
    </div>



    <div align="center" style="padding:10px;">
        <button type="button" id="order" class="btn btn-outline-dark">Order Now</button>
    </div>

    <div id="appear" style="padding:20%; margin-top:-15%; display:none;">

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Name</span>
            <input type="text" class="form-control" name="name" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" name="email"  placeholder="Email" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <span class="input-group-text" id="basic-addon2">@gmail.com</span>
        </div>

        <label for="basic-url" class="form-label">Contract</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">Adress</span>
            <input type="text" class="form-control" name="address"  id="basic-url" aria-describedby="basic-addon3">
        </div>



        <div class="input-group mb-3">
            <span class="input-group-text">Phone NO</span>
            <input type="text" class="form-control" name="phone" placeholder="Contact no..." aria-label="Server">
        </div>



        <div align="center">
            <input type="submit" class="btn btn-outline-success" value="Order Confirm">
            <button type="button" id="close" class="btn btn-outline-danger">close</button>
        </div>

    </div>

    </form>























    <footer style="margin-top:25%;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="index.html"><img src="assets/images/white-logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Klassy Cafe Co.

                            <br>Design: TemplateMo
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
<!-- jquerry -->
    <script type="text/javascript">
    
    $('#order').click(
        function()
        {
            $('#appear').show();
        }
    );
 
    $('#close').click(
        function()
        {
            $('#appear').hide();
        }
    );
    </script>
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function() {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function() {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });
    </script>
</body>

</html>