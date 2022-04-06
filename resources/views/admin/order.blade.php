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
        <div style="position:relative; top: 20px; right: -10px; " class="table-responsive">
        <!-- search bar -->
      
            <div class="hello">
                <div class="search-box">
                <form action="{{url('/search')}}" method="get">
                    <button class="btn-search" type="submit"><i class="fas fa-search"></i></button>
                    <input type="text" class="input-search" name="search" placeholder="Type to Search...">
                 </form>
                </div>
            </div>
            
               <!-- end search bar -->
            <h1 style="font-family: Bold Serif; color:  #3399ff; ">Customer Order</h1>
            <table class="table table-dark table-striped">
                <tr>
                    <th>#id</th>
                    <th>FoodName</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Reserve</th>

                </tr>
                @foreach($data as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->foodname}}</td>
                    <td>${{$data->price}}</td>
                    <td>{{$data->quantity}}</td>
                    <td>${{$data->quantity*$data->price}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->adress}}</td>
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