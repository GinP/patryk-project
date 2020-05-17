@extends('../layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="btn-group mb-1">
                @foreach($categories as $category)
                    <a class="btn btn-primary" href="{{ route('categories.filter', ['category' => $category->id]) }}">
                        {{ $category->name }}
                    </a>
                @endforeach
                </div>
                @forelse($adverts as $advert)
                    <div class="card mb-1">
                        <div class="card-header">
                            {{ $advert->price }} @if( $advert->negotiation === '1') To Negotiate @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $advert->title }}</h5>
                            <p class="card-text">{{ $advert->description }}</p>
                        </div>
                    </div>
                @empty
                    No adverts available
                @endforelse

                {{ $adverts->links() }}
            </div>
        </div>
    </div>
@endsection
