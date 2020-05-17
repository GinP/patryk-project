@extends('../layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="btn-group-lg">
                @foreach($categories as $category)
                        <form action="{{ route('categories.filter', ['category' => $category->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary" name="id" value="{{ $category->id }}">{{ $category->name }}</button>
                        </form>
                @endforeach
                </div>
                @forelse($adverts as $advert)
                    <div class="card">
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
