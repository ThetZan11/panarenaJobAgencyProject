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
            <h1>Food menu</h1><br><br>

            <div style="position: relative; top:60px; right:-150px; padding:50px;"  >
                <form action="{{ url('/uploadfood') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div>
                        <label for="">Title</label>
                        <input style="color: black" type="text" name="title" placeholder="Enter Title" required>
                    </div>

                    <div>
                        <label for="">Price</label>
                        <input style="color: black" type="text" name="price" placeholder="Enter Price" required>
                    </div>

                    <div>
                        <label for="">Image</label>
                        <input type="file" name="image"  required>
                    </div>

                    <div>
                        <label for="">Description</label>
                        <input style="color: black" type="text" name="description" placeholder="Enter Description" required>
                    </div>

                    <div>
                        <input style="border: 1px solid black; padding 20px;" type="submit" value="Save">
                    </div>
                </form>

                <div>

                    <table bgcolor="black">
                        <tr>
                            <th style="padding:30px;">Food Name</th>
                            <th style="padding:30px;">Price</th>
                            <th style="padding:30px;">Image</th>
                            <th style="padding:30px;">Description</th>
                            <th style="padding:30px;">Action</th>
                        </tr>
                        @foreach ($data as $data)
                        <tr align="center">
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->price }} Ks</td>
                            <td><img src="/foodimage/{{$data->image}}" alt="" width="200px" height="200px"></td>
                            <td>{{ $data->description }}</td>
                            <td><a href="{{ url('/deletemenu',$data->id) }}">Delete</a>
                                <a href="{{ url('/updateview',$data->id) }}">Update</a></td>

                        </tr>
                        @endforeach
                    </table>

                </div>

            </div>

        </div>

            @include("admin.adminscript")
    </body>
</html>

