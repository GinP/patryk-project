@extends('../layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @forelse($adverts as $advert)
                <div class="card">
                    <div class="card-header">
                        {{ $advert->price }} @if( $advert->negotiation === '1') To Negotiate @endif
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $advert->title }}</h5>
                        <p class="card-text">{{ $advert->description }}</p>
                        <a href="{{ url('adverts/'.$advert->id.'/edit') }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
                @empty
                    No adverts available
                @endforelse
            </div>
        </div>
    </div>
@endsection
