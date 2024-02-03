@extends('extra.master')
@section('title', 'Brand beans | Slogan Create')
@section('content')
    <div class='container'>
        <div class='row pt-5'>
            <div class='col-md-12'>
                <div class="d-flex justify-content-between mb-3">
                    <div class="p-2">
                        <h3>Packages</h3>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">

            @foreach ($subpack as $subpack)
                <div class="col-md-4 p-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body ">
                            <?php
                            // $price = 0;
                            // $price = (($subpack->price) * ($subpack->discount) / 100);
                            ?>
                            <h3 class="card-title">{{ $subpack->title }}</h3>
                            <!-- <h5 class="">₹<del>{{ $subpack->price }}</del> / {{ $subpack->subscriptionType }}</h5> -->
                            <h5 class="">₹{{ $subpack->price }}
                                <?php
                                ?>
                                / {{ $subpack->subscriptionType }}</h5>

                            @if ($subpack->priceType != 'Free')
                            @endif
                            <!-- <p class="mt-2 fw-light h5">1 NFC Smart Card FREE. SAVE 16%</p> -->
                            <div class="text-center">
                                @if ($subpack->priceType == 'Free')
                                    <a href="register"><button type="button" class="btn btn-outline-primary btn-sm mt-2">SIGN
                                            UP
                                            FREE</button></a>
                                @else
                                    {{-- <form class="form" action="{{ route('package.payment') }}" enctype="multipart/form-data" method="post">
                                                @csrf
                                                <input type="hidden" name="amount" value="{{ $subpack->price }}">
                                                <input type="hidden" name="name" value="{{ $subpack->title }}">
                                                <button type="submit" class="btn btn-primary btn-lg mt-2">Get Started</button>
                                            </form> --}}
                                    <form id="payment-form" action="{{ route('razorpay.payment.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="amount" id="amount" value="{{ $subpack->price }}" />
                                        <button id="pay-button" class="btn btn-primary btn-sm mt-2" type="button">Get Started</button>
                                    </form>
                                @endif
                            </div>
                            <h6 class="card-text mt-3 h4">Best features for this Package.</h6>
                            <p class="card-text"><small class="text-muted">{{ $subpack->details }}</small></p>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.getElementById('pay-button').onclick = function(e) {
            var amount = document.getElementById('amount').value;
            var options = {
                "key": "{{ env('RAZORPAY_KEY') }}",
                "amount": amount * 100, // amount in the smallest currency unit
                "currency": "INR",
                "name": "Brandbeans",
                "description": "Razorpay payment",
                "image": "/images/logo-icon.png",
                "handler": function(response) {
                    // Handle the response after payment
                    // console.log(response);
                    var paymentId = response.razorpay_payment_id;
                    storePaymentId(paymentId, amount);
                },
                "prefill": {
                    "name": "ABC",
                    "email": "abc@gmail.com"
                },
                "theme": {
                    "color": "#ff7529"
                }
            };
            var rzp = new Razorpay(options);
            rzp.open();
        };

        function storePaymentId(paymentId = '', amount = '') {
            // Make an asynchronous POST request to your server
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('/razorpay-payment', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        paymentId: paymentId,
                        amount: amount
                    }),
                })
                .then(response => {
                    // Handle the response from the server
                    // console.log("responses", response);
                    // console.log("paymentId", paymentId);

                    console.log('Payment ID stored successfully');
                })
                .catch(error => {
                    console.error('Error storing payment ID: ', error);
                });
        }
    </script>
@endsection
