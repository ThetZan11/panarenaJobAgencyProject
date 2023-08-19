<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include("admin.admincss")
  </head>
  <body>

    <div class="container-scroller">
    @include("admin.navbar")


    <form action="{{ url('uploadchef') }}" method="Post" enctype="multipart/form-data">

        @csrf
            <div>
                <label for="">Name</label>
                <input style="color: blue" type="text" name="name" placeholder="Enter Chef Name" required >
            </div>

            <div>
                <label for="">Speciality</label>
                <input style="color: blue" type="text" name="speciality" placeholder="Enter Speciality" required >
            </div>

            <div>
                <input type="file" name="image" required>
            </div>

            <div>
                <input style="color: blue" type="submit" value="Save">
            </div>

    </form>

    <div>

        <table bgcolor="black">
            <tr>
                <th style="padding:30px;">Chef Name</th>
                <th style="padding:30px;">Speciality</th>
                <th style="padding:30px;">Image</th>
                <th style="padding:30px;">Action</th>
            </tr>
            @foreach ($data as $data)
            <tr align="center">
                <td>{{ $data->name }}</td>
                <td>{{ $data->speciality }} </td>
                <td><img src="/chefimage/{{$data->image}}" alt="" width="100px" height="100px"></td>
                <td><a href="{{ url('/deletechef',$data->id) }}">Delete</a>
                    <a href="{{ url('/updatechef',$data->id) }}">Update</a></td>

            </tr>
            @endforeach
        </table>

    </div>




    </div>

    @include("admin.adminscript")
  </body>
</html>
