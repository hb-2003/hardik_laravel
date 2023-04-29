@extends('layouts.user.app')
@section('title', 'content')

@section('css')

@endsection

@section('style')
@endsection

@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="card bg-light overflow-hidden">
                                        <div class="card-body">
                                            <div class="faq-icon">
                                                <i class="bx bx-help-circle text-primary"></i>
                                            </div>
                                            <h5 class="text-primary">01.</h5>
                                            <h5 class="faq-title mt-3">How do I place an order?</h5>
                                            <p class="faq-ans text-muted mt-2 mb-0">To place an order, simply browse our products and add the items you want to your cart. Then, proceed to checkout and follow the instructions to complete your purchase.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="card bg-light overflow-hidden">
                                        <div class="card-body">
                                            <div class="faq-icon">
                                                <i class="bx bx-help-circle text-primary"></i>
                                            </div>
                                            <h5 class="text-primary">02.</h5>
                                            <h5 class="faq-title mt-3">What payment methods do you accept?</h5>
                                            <p class="faq-ans text-muted mt-2 mb-0">We accept all major credit cards, PayPal, and Apple Pay.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="card bg-light overflow-hidden">
                                        <div class="card-body">
                                            <div class="faq-icon">
                                                <i class="bx bx-help-circle text-primary"></i>
                                            </div>
                                            <h5 class="text-primary">03.</h5>
                                            <h5 class="faq-title mt-3">What is your return policy?</h5>
                                            <p class="faq-ans text-muted mt-2 mb-0">Most orders are processed and shipped within 1-2 business days. Delivery times vary depending on your location and the shipping method you choose.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="card bg-light overflow-hidden">
                                        <div class="card-body">
                                            <div class="faq-icon">
                                                <i class="bx bx-help-circle text-primary"></i>
                                            </div>
                                            <h5 class="text-primary">04.</h5>
                                            <h5 class="faq-title mt-3">Can I track my order?</h5>
                                            <p class="faq-ans text-muted mt-2 mb-0">Yes, you will receive a tracking number once your order has shipped.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="card bg-light overflow-hidden">
                                        <div class="card-body">
                                            <div class="faq-icon">
                                                <i class="bx bx-help-circle text-primary"></i>
                                            </div>
                                            <h5 class="text-primary">05.</h5>
                                            <h5 class="faq-title mt-3">Do you offer assembly services?</h5>
                                            <p class="faq-ans text-muted mt-2 mb-0">Yes, we offer assembly services for select items. Please see the product page for more information.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="card bg-light overflow-hidden">
                                        <div class="card-body">
                                            <div class="faq-icon">
                                                <i class="bx bx-help-circle text-primary"></i>
                                            </div>
                                            <h5 class="text-primary">06.</h5>
                                            <h5 class="faq-title mt-3">Do you offer financing?</h5>
                                            <p class="faq-ans text-muted mt-2 mb-0">Yes, we offer financing through our partner, Affirm. Please see the checkout page for more information.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row -content-end">
                        <div class="col-sm-9">
                            <div>
                            
                                <a href="{{route('user.account')}}" class="btn btn-danger"> Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

</div>



@endsection

@section('js')

@endsection