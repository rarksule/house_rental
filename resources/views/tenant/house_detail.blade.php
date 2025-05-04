<x-app-layout>
    <!-- Property Header Section -->
    <div class="property-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="display-4">{{$house->address}}</h1>
                    <p class="lead text-muted">{{$house->address}}</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <h2 class="text-primary">{{$house->amount}}<small class="text-muted">/ Month</small></h2>
                    <div class="mt-3">
                        <button class="btn btn-outline-secondary me-2"><i
                                class="bi bi-share"></i>{{__('message.share')}}</button>
                        <button class="btn btn-outline-secondary"><i
                                class="bi bi-bookmark"></i>{{__('message.save')}}</button>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <span class="badge bg-light text-dark me-2"><i class="bi bi-door-open"></i>
                        {{$house->amenities[0] ?? ''}}</span>
                    <span class="badge bg-light text-dark me-2"><i
                            class="bi bi-bucket"></i>{{$house->amenities[1] ?? ''}}</span>
                    <span class="badge bg-light text-dark"><i class="bi bi-rulers"></i>
                        {{$house->amenities[2] ?? ''}}m²</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Main Content Row -->
        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-8">

                <div class="container-fluid p-0">
                    {{-- First Row (40% height) --}}
                    <div class="row gx-1 mx-3 mb-2" style="height: 40vh;">
                        @for ($i = 0; $i < 2; $i++)
                            <div class="col-6 h-100">
                                <img src="{{ getAllMedia($house)[$i] ?? noImage() }}" alt="Property"
                                    class="img-fluid rounded w-100 h-100" style="object-fit: cover;">
                            </div>
                        @endfor
                    </div>

                    {{-- Second Row (60% height) --}}
                    <div class="row gx-1 mx-3" style="height: 30vh;">
                        @for ($i = 2; $i < 5; $i++)
                            <div class="col-4 h-100">
                                <img src="{{ getAllMedia($house)[$i] ?? noImage() }}" alt="Property"
                                    class="img-fluid rounded w-100 h-100" style="object-fit: cover;">
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- Description Section -->
                <section class="my-5">
                    <h2 class="mb-4">Description</h2>
                    <p>{{$house->description}}</p>
                </section>

                <!-- Amenities Section -->
                <section class="mb-5">
                    <h2 class="mb-4">Amenities</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="amenities-list">
                                <li><i class="bi bi-check-circle text-success me-2"></i> Swimming pool</li>
                                <li><i class="bi bi-check-circle text-success me-2"></i> Air Conditioning</li>
                                <li><i class="bi bi-check-circle text-success me-2"></i> 4 Bedrooms</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="amenities-list">
                                <li><i class="bi bi-check-circle text-success me-2"></i> 2 Bathrooms</li>
                                <li><i class="bi bi-check-circle text-success me-2"></i> 447 m² Living Area</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- Reviews Section -->
                <section class="mb-5">
                    <h2 class="mb-4">{{__('message.review')}}</h2>
                    @foreach ($house->reviews as $review)
                        <div class="card review-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <h5 class="card-title">{{$review->tenant->first_name}}</h5>
                                    <small class="text-muted">{{timeAgo($review->created_at)}}</small>
                                </div>
                                <div class="mb-3 property-rating">
                                    @for ($i = 1; $i <= $reviews->ratting; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor

                                    @for ($i = 5; $i > $reviews->ratting; $i--)
                                        <i class="far fa-star"></i>
                                    @endfor

                                    <span class="ms-1">({{ $totalReviews }} /5)</span>
                                </div>
                                <p class="card-text">{{$review->comment}}</p>
                            </div>
                        </div>
                    @endforeach
                </section>
            </div>

            <!-- Right Column -->
            <div class="col-lg-4">
                <!-- Agent Info -->
                <div class="card mb-4">
                    <div class="card-body">
                    <h3 class="mb-4 me-0">{{__('message.owner.contact')}}</h3>
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{getSingleImage($house->owner, 'profile_image')}}" alt="Agent photo"
                                class="rounded-circle me-3">
                            <div>
                                <h5 class="mb-0">Lydia Strosin</h5>
                                <p><i class="bi bi-telephone me-2"></i>{{$house->owner->contact_number}}</p>
                            </div>
                        </div>
                        <p class="card-text">Rerum et libero error labore provident deleniti unde. Consequetur illum
                            quos eos. Id qui ipsum recusandae rem. Numquam laboriosam magnam et delectus.</p>
                        <form>
                            <div class="my-3">
                                <label for="message" class="form-label">{{__('message.message')}}*</label>
                                <textarea class="form-control" id="message" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">{{__('message.send_msg')}}</button>
                        </form>
                    </div>
                </div>

                <!-- Location Map -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">{{__('message.location')}}</h5>
                        <div class="ratio ratio-16x9 mb-3">
                            <iframe src="{{$house->map_link}}
                                allowfullscreen=" loading="lazy"></iframe>
                        </div>
                        <p class="card-text">{{$house->address}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>