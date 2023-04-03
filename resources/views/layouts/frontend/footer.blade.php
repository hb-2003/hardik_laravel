<!-- <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Markers</h4>
                <a href="https://hpneo.dev/gmaps/examples/markers.html" target="_blank" class="btn btn-sm btn-soft-secondary">Docs <i class="mdi mdi-arrow-right align-middle"></i></a>
            </div>
            <div class="card-body">
                <div id="gmaps-markers" class="gmaps"></div>
            </div>
        </div>
    </div>
</div> -->
<div class="footer ">

    <div class="card-body">
        <footer class="p-5">
            <div class="row">
                <div class="col-8 col-md-3 mb-3 ">
                    <ul class="nav flex-column">
                        <li>
                            <div class="pt-2" style="display:inline-flex;">
                                <img src="{{asset('assets/images/logo-sm.svg')}}" alt="" width="50">
                                <h5 class="pt-3 text-dark"> Vuesy Furniture</h5>
                            </div>
                        </li>
                        <li>
                            <h6 class="pt-3">PREMIUM BATHING RANGE</h6>
                        </li>
                        <li>
                            <p class="text-muted">Best exprience for using product and it is become best product</p>
                        </li>
                        <li>
                            <div style="display: inline-flex;">
                                <a href="">
                                    <h3 class="p-2 "> <i class="bx bxl-instagram-alt" style="width: auto;"></i></h3>
                                </a>
                                <a href="">
                                    <h3 class="p-2"> <i class="bx bxl-twitter" style="width: auto;"></i></h3>
                                </a>
                                <a href="">
                                    <h3 class="p-2"> <i class="bx bxl-facebook" style="width: auto;"></i></h3>
                                </a>
                                <a href="">
                                    <h3 class="p-2"> <i class="bx bxl-youtube" style="width: auto;"></i></h3>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-md-2  mb-3">


                    <h5>Contect Us:</h5>
                    <p class="mb-0">Mail Us at -</p>
                    <p class="mb-0">vuesyfurnitureservic@gamil.</p>
                    <p class="mb-0">com</p>

                    </ul>
                </div>

                <div class="col-6 col-md-2  mb-3">
                    <h5>Quick Link</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="{{route('home')}}" class="nav-link p-0 text-muted">Home</a></li>
                        <li class="nav-item mb-2"><a href="{{route('product')}}" class="nav-link p-0 text-muted">Product</a></li>
                        <li class="nav-item mb-2"><a href="{{route('contectus')}}" class="nav-link p-0 text-muted">Contect us</a></li>
                        <li class="nav-item mb-2"><a href="{{route('faqs')}}" class="nav-link p-0 text-muted">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="{{route('aboutus')}}" class="nav-link p-0 text-muted">About us</a></li>
                    </ul>

                </div>
                <div class="col-md-4 offset-md-1 mb-3">
                    <form action="{{route('user.subscribe')}}" method="POST">
                        @csrf
                        <h5>Subscribe to our newsletter</h5>
                        <p>Subscribe to receive updates, access to exclusive deals, and more.</p>

                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="email" default="NUll" name="email" class="form-control" placeholder="Email address">
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </footer>
    </div>
</div>