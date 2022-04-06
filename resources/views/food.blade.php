<section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Our Menu</h6>
                    <h2>Our selection of cakes with quality taste</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">

                @foreach($data as $data)
                <form action="{{url('/addcart',$data->id)}}" method="post">
              @csrf
                <div class="item">
                    <div style="background-image: url('/foodimage/{{$data->image}}');" class='card '>
                        <div class="price">
                            <h6>${{$data->price}}</h6>
                        </div>
                        <div class='info'>
                            <h1 class='title'>{{$data->title}}</h1>
                            <p class='description'>{{$data->description}}</p>
                            
                            <div class="main-text-button">
                                <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                            </div>
                          
                        </div>
                       
                    </div>
                    <br>
                    <input style=" margin-left:5%; border-color:#DC143C;text-align:center;" type="number" value="1" name="quantity" min="0">
                    <input style=" margin-top:10px; margin-left:25%;" class="btn btn-danger" type="submit" value="Add Cart" >
                   
                </div>
                </form>
                @endforeach

            </div>
        </div>
    </div>
</section>