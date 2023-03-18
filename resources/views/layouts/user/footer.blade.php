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
<div class="footer">

    <div class="card-body">



        <footer class="p-5">
            <div class="row">
                <div class="col-6 col-md-2 mb-3 ">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="{{route('home')}}" class="nav-link p-0 text-muted">Home</a></li>
                        <li class="nav-item mb-2"><a href="{{route('product')}}" class="nav-link p-0 text-muted">Product</a></li>
                        <li class="nav-item mb-2"><a href="{{route('contectus')}}" class="nav-link p-0 text-muted">Contect us</a></li>
                        <li class="nav-item mb-2"><a href="{{route('faqs')}}" class="nav-link p-0 text-muted">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="{{route('aboutus')}}" class="nav-link p-0 text-muted">About us</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2  mb-3">
                    <h5>Mail Us:</h5>
                    <p class="mb-0">Vuesy Furnitre private Limited,</p>
                    <p class="mb-0">Buildings Alyssa, Begonia & </p>
                    <p class="mb-0">Clove Embassy Tech Village,</p>
                    <p class="mb-0"> Outer Ring Road, Devarabeesanahalli Village,</p>
                    <p class="mb-0">Bengaluru, 560103,</p>
                    <p class="mb-0"> Karnataka, India</p>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">facebook</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Twitter</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">instagram</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>

                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">
                    <form action="{{route('user.subscribe')}}" method="POST">
                        @csrf
                        <h5>Subscribe to our newsletter</h5>
                        <p>Monthly digest of what's new and exciting from us.</p>

                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="email" name="email" class="form-control" placeholder="Email address">
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>

        </footer>

    </div>
</div>