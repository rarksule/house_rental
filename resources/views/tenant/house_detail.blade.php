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
                    <h2 class="text-primary display-6">{{$house->price}}<small class="text-muted">/ Month</small></h2>
                    <div class="mt-3">
                        <button class="btn btn-outline-secondary me-2"><i
                                class="bi bi-share me-1"></i>{{__('message.share')}}</button>
                        <button class="btn btn-outline-secondary"><i
                                class="bi bi-bookmark me-1"></i>{{__('message.save')}}</button>
                    </div>
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
                        @if (getAllMedia($house)->count() <= 2)
                        @for ($i = 0; $i < 2; $i++)
                            <div class="col-6 h-100">
                                <img src="{{ getAllMedia($house)[$i] ?? noImage() }}" alt="Property"
                                    class="img-fluid rounded w-100 h-100" style="object-fit: cover;">
                            </div>
                        @endfor 
                        @endif
                        
                    </div>

                    {{-- Second Row (60% height) --}}
                    @if (getAllMedia($house)->count() >= 2)
                    <div class="row gx-1 mx-3" style="height: 30vh;">
                        @for ($i = 2; $i <= getAllMedia($house)->count(); $i++)
                            <div class="col-4 h-100">
                                <img src="{{ getAllMedia($house)[$i] ?? noImage() }}" alt="Property"
                                    class="img-fluid rounded w-100 h-100" style="object-fit: cover;">
                            </div>
                        @endfor
                    </div>
                    @endif
                </div>

                <!-- Description Section -->
                <section class="my-5">
                    <h2 class="mb-4">Description</h2>
                    <p>{!! $house->description !!}</p>
                </section>

                <!-- Amenities Section -->
                <section class="mb-5">
                    <h2 class="mb-4">Amenities</h2>
                    <div class="row">
                        
                            
                        <div class="col-md-6">
                            <ul class="amenities-list">
                            @foreach ($house->amenities as $key => $value)
                                <li><i class="{{$value ? 'bi bi-check-circle text-success me-2' : 'bi bi-x-circle text-danger me-2'}}"></i> {{$key}}</li>
                          @endforeach
                            </ul>
                        </div>
                        
                    </div>
                </section>

                <div class="rating-container mb-4">
                    <h4>Rate this property</h4>
                    
                    <!-- Star Rating -->
                    <div class="star-rating mb-3 h2 property-rating">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="star" data-value="{{ $i }}">
                                <i class="far fa-star"></i>
                            </span>
                        @endfor
                        <input type="hidden" name="rating" id="rating-value" value="0">
                    </div>
                    
                    <!-- Comment Form -->
                    <div class="mb-3">
                        <label for="comment" class="form-label">Your Review</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Share your experience..."></textarea>
                    </div>
                    
                    <button type="button" class="btn btn-primary" id="submit-rating">Submit Review</button>
                </div>

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
                                <h5 class="mb-0">{{$house->owner->name}}</h5>
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
<script>
    $(document).ready(function() {
    // Star rating hover effect
    $('.star').hover(
        function() {
            const value = $(this).data('value');
            $('.star').each(function(index) {
                if (index < value) {
                    $(this).find('i').removeClass('far').addClass('fas');
                }
            });
        },
        function() {
            const currentRating = $('#rating-value').val();
            $('.star').each(function(index) {
                if (index >= currentRating) {
                    $(this).find('i').removeClass('fas').addClass('far');
                }
            });
        }
    );

    // Star rating click
    $('.star').click(function() {
        const value = $(this).data('value');
        $('#rating-value').val(value);
        
        $('.star').each(function(index) {
            if (index < value) {
                $(this).find('i').removeClass('far').addClass('fas');
            } else {
                $(this).find('i').removeClass('fas').addClass('far');
            }
        });
    });

    // Submit rating
    $('#submit-rating').click(function() {
        const rating = $('#rating-value').val();
        const comment = $('#comment').val();
        
        if (rating == 0) {
            alert('Please select a rating');
            return;
        }
        
        $.ajax({
            url: '{{ route("tenant.house.rate", $house->id) }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                rating: rating,
                comment: comment
            },
            success: function(response) {
                location.reload();
            },
            error: function(xhr) {
                alert('Error submitting review');
            }
        });
    });
});
</script>
</x-app-layout>