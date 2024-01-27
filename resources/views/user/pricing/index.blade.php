@extends('extra.master')
@section('title', 'Brand beans | Slogan Create')
@section('content')
    <div class='container'>
        <div class='row pt-5'>
            <div class='col-md-12'>
                <div class="d-flex justify-content-between mb-3">
                    <div class="p-2">
                        <h3>Slogans Create</h3>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('writer.slugs.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        @foreach ($subpack as $subpack)
                            <div class="card bg-light ms-4">
                                <div class="card-body">
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
                                            <a href="register"><button type="button" class="btn btn-outline-primary btn-lg mt-2">SIGN
                                                    UP
                                                    FREE</button></a>
                                        @else
                                            <form class="form" action="{{ route('package.payment') }}" enctype="multipart/form-data" method="post">
                                                @csrf
                                                <input type="hidden" name="amount" value="{{ $subpack->price }}">
                                                <input type="hidden" name="name" value="{{ $subpack->title }}">
                                                <button type="submit" class="btn btn-primary btn-lg mt-2">Get Started</button>
                                            </form>
                                        @endif
                                    </div>
                                    <h6 class="card-text mt-3 h4">Best features for this Package.</h6>
                                    <p class="card-text"><small class="text-muted">{{ $subpack->details }}</small></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
