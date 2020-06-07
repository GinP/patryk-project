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
                @forelse($adverts as $key => $advert)
                    <div class="card mb-1">
                        <div class="card-header">
                            {{ $advert->price }} @if( $advert->negotiation === '1') To Negotiate @endif
                            @if(!empty($images[$key]))
                                @foreach($images[$key] as $image)
                                    <img src="{{ $image->getUrl('thumb') }}" alt="..." class="rounded-circle float-right" style="height: 50px; width: 50px">
                                @endforeach
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $advert->title }}</h5>
                            <p class="card-text">{{ $advert->description }}</p>
                            <a href="{{ route('adverts.show', ['advert' => $advert->id]) }}" class="btn btn-primary float-lg-right">Show details</a>
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
