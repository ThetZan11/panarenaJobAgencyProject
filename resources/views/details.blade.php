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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    </head>

    <body>

    <!-- ***** Preloader Start ***** -->
    {{-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> --}}
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <div class="container mt-5">
        <br><br><br>
    <a href="{{ url('redirects') }}"><button class="btn btn-danger">Back</button></a>

<li>
    @if (Route::has('login'))
    <div class=" fixed-end sm:block">
        @auth
        <x-app-layout>

        </x-app-layout>
        @else
            <li  class="scroll-to-section"><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a></li>

            @if (Route::has('register'))
               <li  class="scroll-to-section"> <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a></li>
            @endif
        @endauth
    </div>
@endif
</li>
    </div>








    <!-- ***** Header Area End ***** -->

    <div class="container-xl">


        <form action="{{ url('applyjob') }}" method="Post" enctype="multipart/form-data">
            @csrf


    <div id="top">
        <div class="text-center">
            <div class="mb-3 text-center">
                <img src="foodimage/{{$data->image}}" width="400px" height="350px" style="display: initial;">
            </div>
            <div class="mb-3">
                <input type="text" name="foodname[]" value="{{$data->title}}" hidden="">
                {{$data->title}}
            </div>
            <div class="mb-3">
                <input type="text" name="price[]" value="{{$data->price}}" hidden="">
                {{$data->price}} MMK
            </div>
            <div class="mb-3">
                {{$data->description}}
            </div>

        </div>



    <br>



    <div align="center">
        <button style="padding: 10px; color:black;" type="button" class="btn btn-info" id="order">Apply Job</button>
    </div>
    <br>
    </div>


    <div  id="appear" style="padding: 10px; display:none;" >

        <div class="mb-3">
           <h1>Enter this form if you want to apply Job</h1>
          </div>


        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Your name" required>
          </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="number" class="form-control" name="phone" placeholder="Enter Your Phone number" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Secondary Phone Number</label>
            <input type="number" class="form-control" name="phone2" placeholder="Enter Your secondary Phone number" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea class="form-control" name="address" rows="2" placeholder="Enter Yout current Address" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Enter Your Photo</label>
            <input type="file" class="form-control" name="image1" placeholder="Enter Your Photo" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Enter Your Photo</label>
            <input type="file" class="form-control" name="image2" placeholder="Enter Your Photo" required>
        </div>

        {{-- <div class="mb-3">
            <label class="form-label">Enter Your Photo</label>
            <input type="file" class="form-control" name="image3" placeholder="Enter Your Photo">
        </div> --}}

        <div class="mb-3">
            <label class="form-label">Enter Your Facebook Account Link</label>
            <input type="text" class="form-control" name="fbacc" placeholder="Enter Your Facebook Account Link" required>
        </div>








        <div class="mb-4 text-center">
            <input type="submit" class="btn btn-success " value="Order Confirm" style="color:black">
            <button id="close" type="button" class="btn btn-danger" style="color:black">Close</button>
        </div>

    </div>

</form>

</div>






    <script type="text/javascript">
        $("#order").click(
            function(){

                $("#appear").show();
            });

            $("#close").click(
            function(){
                $("#appear").hide();
            });

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


    </body>
  </html>

