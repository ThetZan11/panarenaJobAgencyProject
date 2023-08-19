<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
        <base href="/public">






    @include("admin.admincss");
  </head>
  <body>
    <div class="container-scroller">


    @include("admin.navbar");

    <div style="position: relative; top:60px; right:-150px; padding:50px;"  >
        <form action="{{ url('/update',$data->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div>
                <label for="">Title</label>
                <input style="color: black" type="text" name="title" value="{{$data->title}}" required>
            </div>

            <div>
                <label for="">Price</label>
                <input style="color: black" type="text" name="price" value="{{$data->price}}" required>
            </div>

            <div>

                <img height="200px" width="200px " src="/foodimage/{{$data->image}}" alt="">
            </div>

            <div>
                <label for="">Image</label>
               <input type="file" name="image" required>
            </div>

            <div>
                <label for="">Description</label>
                <input style="color: black" type="text" name="description" value="{{$data->description}}" required>
            </div>

            <div>
                <input style="border: 1px solid black; padding 20px;" type="submit" value="Update">
            </div>
        </form>

        <div>




    </div>





    @include("admin.adminscript")
  </body>
</html>
