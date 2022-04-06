<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    @include("admin.admincss")
    <script src="https://kit.fontawesome.com/157630243c.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-scroller">
        @include("admin.navbar")
        <!-- main-panel ends -->
        <div style="position:relative; top:80px; right: -150px;">
        <h1 style="font-family:  Bold Serif; color:  #3399ff; text-align:center;">Users</h1>
        <input type="button" id="load">
        <div id="table">

        </div>
            <table class="table table-dark table-striped">
                <tr>
                    <th>#id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>UserType</th>
                    <th>Action</th>
                </tr>
                @foreach($data as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>
                        @if($data->usertype=="1")
                        Admin
                        @else
                        Employed
                        @endif
                    </td>
                    <td>
                        @if($data->usertype=="1")
                        <i class="fa-solid fa-user-slash"></i>
                        @else
                        <a href="{{url('/deleteuser',$data->id)}}"><i class="fa-solid fa-trash-can"></i></a>
                        @endif
                    </td>
                   
                </tr>
                @endforeach
            </table>
        </div>

    </div>
    @include("admin.adminjs")

</body>

</html>