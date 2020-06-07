@extends('../layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">
                        <h5 class="card-title">{{ $advert->price }} @if( $advert->negotiation === '1') To Negotiate @endif</h5>
                    </div>
                    <div class="card-body">
                            <div class="form-group col">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @forelse($images as $image)
                                            @if($loop->first)

                                                <div class="carousel-item active">
                                                    <img class="d-block w-100" src="{{ $image->getUrl() }}" alt="First slide" style="max-height: 500px;">
                                                </div>
                                            @endif
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ $image->getUrl() }}" alt="Another slide" style="max-height: 500px;">
                                            </div>
                                        @empty
                                            <p>No images available</p>
                                        @endforelse
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                    </div>
                        <h5 class="card-title">{{ $advert->title }}</h5>
                        <p class="card-text">{{ $advert->description }}</p>
                        <a href="{{ route('adverts')}}" class="btn btn-primary">Go back</a>
                    </div>
                    <div class="card-footer text-muted">
                        Created at {{ $advert->created_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
