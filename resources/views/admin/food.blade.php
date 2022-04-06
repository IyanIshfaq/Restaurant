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
        <div style="position:relative; top: 20px;  right: -30px;">

            <form class="row g-3" action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Title</label>
                    <input style="color : #DCDCDC;" type="text" name="title" class="form-control" id="inputEmail4">
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="form-label">Description</label>
                    <input style="color : #DCDCDC;" type="text" name="description"class="form-control" id="inputAddress" placeholder="Description.................">
                </div>

                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Prize</label>
                    <input style="color : #DCDCDC;" type="text"  name="price" class="form-control" id="inputCity" placeholder="$000">
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="inputCity">
                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Check me out
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </div>
            </form>

            <br>
            <br>
            <h1 style="font-family:  Bold Serif; color:  #3399ff; text-align:center;">Food Menu</h1>
            <table class="table table-dark table-striped">
                <tr>
                    <th>#id</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
                @foreach($data as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->title}}</td>
                    <td>${{$data->price}}</td>
                    <td> {{$data->description}}</td>
                    <td><img src="/foodimage/{{$data->image}}" > </td>
                    <td>
                        <a href="{{url('/deletefood',$data->id)}}"><i class="fa-solid fa-trash-can"></i></a>
                        
                    </td>
                    <td>
                        <a href="{{url('/updateview',$data->id)}}"><i class="fa-solid fa-marker"></i></a>
                        
                    </td>
                   
                </tr>
                @endforeach
            </table>
        </div>
        
    </div>
    <!-- main-panel ends -->
    @include("admin.adminjs")

</body>

</html>