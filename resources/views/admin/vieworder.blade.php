<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include("admin.admincss")
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .table-image{
            width: 100%;
            height: 100%;
        }
    </style>
  </head>

  <body>
    <div class="container-fluid">
    <div class="">
    @include("admin.navbar")

     <div class="">
    <h1>Job Apply</h1>

    <form action="{{ url('/search') }}" method="get" align="center">

        @csrf

        <input type="text" name="search" style="color:tomato">

        <input type="submit" value="Search" class="btn btn-success">
    </form>



    <table class="table-dark table-striped mt-5" align="left">
        <tr bgcolor="grey" align="center">
            <td style="padding: 10px;">Name</td>
            <td style="padding: 10px;">Phone</td>
            <td style="padding: 10px;">Phone2</td>
            <td style="padding: 10px;">Address</td>
            <td style="padding: 10px;">Image1</td>
            <td style="padding: 10px;">Image2</td>

            <td style="padding: 10px;">FB Acc</td>
            <td style="padding: 10px;">Title</td>
            <td style="padding: 10px;">Payment</td>
            <td style="padding: 10px;">Action</td>
        </tr>

        @foreach ($data as $data)


        <tr bgcolor="tomato" align="center">
            <td style="padding: 20px;">{{ $data->name }}</td>
            <td style="padding: 20px;">{{ $data->phone }}</td>
            <td style="padding: 20px;">{{ $data->phone2 }}</td>
            <td style="padding: 20px;">{{ $data->address }}</td>
            <td style="padding: 50px;"> <img src="image1/{{$data->image1}}" class="table-image" ></td>
            <td style="padding: 50px;"> <img src="image2/{{$data->image2}}" class="table-image" ></td>

            <td style="padding: 20px;">{{ $data->fbacc }}</td>
            <td style="padding: 20px;">{{ $data->foodname }}</td>
            <td style="padding: 20px;">{{ $data->price }} Ks</td>
            <td style="padding: 20px;"><a href="{{ url('/deleteorder',$data->id) }}">Delete</a></td>

        </tr>
        @endforeach
    </table>







</div>
</div>
</div>
    @include("admin.adminscript")
  </body>
</html>

