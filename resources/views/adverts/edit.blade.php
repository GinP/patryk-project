@extends('../layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="line-height: 2.5">
                        <form class="" action="{{ route('adverts.destroy', ['advert' => $advert->id]) }}" method="post">
                            {{ __('Edit Advert') }}
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger float-right m-1">Delete Images</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('adverts.update', ['advert' => $advert->id]) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group col">
                                <label for="title">Title</label>
                                <input type="string" class="form-control" name="title" autocomplete="off" value="{{ $advert->title }}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="category">Category</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                    @forelse($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty
                                        <li>No categories available</li>
                                    @endforelse
                                </select>
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="description">Description</label>
                                <textarea class="form-control" value="{{ $advert->description }}" name="description" id="exampleFormControlTextarea1" rows="3">{{ $advert->description }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @forelse($images as $image)
                                            @if($loop->first)

                                                <div class="carousel-item active">
                                                    <img class="d-block w-100" src="{{ $image->getUrl() }}" alt="First slide" style="max-height: 400px;">
                                                </div>
                                            @endif
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ $image->getUrl() }}" alt="Another slide" style="max-height: 400px;">
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

                    <div class="form-group col-3">
                        <label for="price">Price</label>
                        <input type="number" min="0" step="0.01" class="form-control" name="price" autocomplete="off" value="{{ $advert->price }}">
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="negotiation" id="negotiation1" value="1" @if($advert->negotiation == '1') checked @endif>
                            <label class="form-check-label" for="negotiation1">To Negotiate</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="negotiation" id="negotiation2" value="0" @if($advert->negotiation == '0') checked @endif>
                            <label class="form-check-label" for="negotiation2">Without Negotiate</label>
                        </div>
                        @error('negotiation')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary col mb-2">Change Advert</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
