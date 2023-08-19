<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
        <base href="/public">






    @include("admin.admincss")
  </head>
  <body>
    <div class="container-scroller">


    @include("admin.navbar")

        <form action="{{url('/updatefoodchef',$data->id)}}" method="Post" enctype="/multipart/form-data">
            @csrf
            <div>
                <label for="">Chef Name</label>
                <input style="color: blue;" type="text" name="name" value="{{ $data->name }}" placeholder="Enter Chef Name">
            </div>
            <div>
                <label for="">speciality</label>
                <input style="color: blue;" type="text" name="speciality" value="{{ $data->speciality }}" placeholder="Enter Speciality">
            </div>
            <div>
                <label for="">Old Photo</label>
                <img src="/chefimage/{{$data->image}}" alt="" height="300" width="300">
            </div>

            <div>
                <label for="">New image</label>
                <input type="file">
            </div>
            <div>
                <input style="color: blue;" type="submit" value="Update Chef" required>
            </div>
                
            
        </form>
    </div>



    @include("admin.adminscript")
  </body>
</html>
