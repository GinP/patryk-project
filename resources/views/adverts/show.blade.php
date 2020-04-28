@extends('../layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @forelse($advert as $ad)
                    <div class="card">
                        <div class="card-header">
                            {{ $advert->price }} @if( $advert->negotiation === '1') To Negotiate @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $advert->title }}</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                @empty
                    No adverts available
                @endforelse
            </div>
        </div>
    </div>
@endsection
