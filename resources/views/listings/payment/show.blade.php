@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pay for your listing</div>

                <div class="card-body">
                    @if($listing->cost() == 0)
                        <form method="POST" action="{{ route('listing.payment.update', [$area, $listing]) }}">
                            @csrf
                            @method('PATCH')
                            <p>There is nothing for you to pay.</p>
                            <button type="submit" class="btn btn-primary">Complete</button>
                        </form>
                    @else
                        <p>Total cost: R{{(number_format($listing->cost(), 2))}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
