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
        <!-- main-panel ends -->
        <div style="position:relative; top: 20px;  right: -10px;">
        <h1 style="font-family:  Bold Serif; color:  #3399ff; ">Reservation</h1>
            <table class="table table-dark table-striped">
                <tr>
                    <th>#id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Guest</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Message</th>
                    <th>Reserve</th>

                </tr>
                @foreach($data as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->guest}}</td>
                    <td>{{$data->date}}</td>
                    <td>{{$data->time}}</td>
                    <td>{{$data->message}}</td>
                    <td><input type="checkbox"></td>
                </tr>
                @endforeach
            </table>
        </div>
        
    </div>
    <!-- main-panel ends -->
    @include("admin.adminjs")

</body>

</html>