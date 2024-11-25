<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @foreach($product as $products)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{route('details.product',$products->id)}}" class="option1">
                                Details
                            </a>
                            <form action="{{route('cart.product',$products->id)}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4"><input type="number" name="quentity" value="1" min="1"></div>
                                    <div class="col-md-4 btn btn-sucess"> <input type="submit" value="Add to Cart"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="{{ asset('product/'.$products->image) }}" alt="">
                    </div>

                    <div class="detail-box">
                        <h6>

                            {{$products->title}}
                        </h6>
                        @if($products->discount_price)
                        <h6 style="color:blue">
                            Discount Price<br>
                            <span>&#2547; {{ $products->discount_price }} </span>
                        </h6>

                        <h6 style="text-decoration: line-through; color:red ">
                            Price<br>
                            <span>&#2547; {{$products->price}} </span>
                        </h6>
                        @else
                        <h6>
                            <span>&#2547;
                                {{$products->price}}
                            </span>
                        </h6>
                        @endif


                    </div>
                </div>
            </div>


            @endforeach
            <samp style="padding-top: 20px;"> {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}</samp>



        </div>
</section>
