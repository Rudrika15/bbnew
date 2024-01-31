@extends('extra.master')
@section('title', 'Brand beans | User Dashboard')
@section('content')


    <div class='container'>
        <div class='row pt-5'>
            <div class='col-md-12'>
                <h1>My Account</h1>
            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        // A $( document ).ready() block.
        $(document).ready(function() {
            var countValue = localStorage.getItem('count');
            if (countValue == 1) {
                localStorage.setItem('count', "0");
            }
        });
    </script>

@endsection
