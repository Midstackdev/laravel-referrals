@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Subscription') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('subscription.store') }}">
                        @csrf
                        <button class="btn btn-primary" type="submit">make payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
