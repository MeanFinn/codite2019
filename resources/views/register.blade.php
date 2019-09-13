@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
@endsection

@section('body')
<div class="mt-5 pt-3">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12 col-md-7 p-0">
                <div class="card z-depth-3">
                    <div class="card-header">
                        <h4 class="text-center">WELCOME!</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="text-center">Register Here</h5>
                        <hr>
                        @include('_form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/modalswal.js')}}"></script>
<script src="{{ asset('js/selector.js') }}"></script>
@endsection