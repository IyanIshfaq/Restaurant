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
        <!-- main-panel ends -->
        <div style="position:relative; top: 2px;  right: -50px;">

            <form class="row g-3" action="{{url('/update',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
               
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Title</label>
                    <input style="color : #DCDCDC;" type="text" value="{{$data->title}}" name="title" class="form-control" id="inputEmail4">
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="form-label">Description</label>
                    <input style="color : #DCDCDC;" type="text" value="{{$data->description}}" name="description"class="form-control" id="inputAddress" placeholder="Description.................">
                </div>

                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Prize</label>
                    <input style="color : #DCDCDC;" type="text" value="{{$data->price}}" name="price" class="form-control" id="inputCity" placeholder="$000">
                </div>
               
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Image</label>
                    <input type="file" value="{{$data->image}}" name="image" class="form-control" id="inputCity">
                    
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Old_Image</label>
                    <img height="200" width="200" src="/foodimage/{{$data->image}}" >
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
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                
            </form>

          


        </div>
        
    </div>
    <!-- main-panel ends -->
    @include("admin.adminjs")

</body>

</html>