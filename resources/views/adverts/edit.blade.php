@extends('../layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Advert') }}</div>

                    <div class="card-body">
                        <form action="/adverts/{{ $advert->id }}" method="post">
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

                            <button type="submit" class="btn btn-primary col">Change Advert</button>
                        </form> </br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
