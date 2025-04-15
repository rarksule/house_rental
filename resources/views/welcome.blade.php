<x-app-layout>
    <div class="welcome">
        <section class="hero-section">
            <div class="container text-center">
                <h1 class="display-4 fw-bold mb-4">Find Your Perfect Home in JIGJIGA</h1>
                <p class="lead mb-5">From as low as 1999 birr per month with limited time offer</p>


                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h1 class="text-center mb-5">Find Accessible Homes To Rent</h1>

                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="card-title mb-4">Search for a location</h3>

                                <div class="mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search Neighborhoods..." list="neighborhoodOptions">
                                        <button class="btn btn-primary" type="button">Search</button>
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Min Price</label>
                                        <select class="form-select">
                                            <option selected>No Min</option>
                                            <option>$500</option>
                                            <option>$1,000</option>
                                            <option>$1,500</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Max Price</label>
                                        <select class="form-select">
                                            <option selected>No Max</option>
                                            <option>$1,000</option>
                                            <option>$2,000</option>
                                            <option>$3,000</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </section>


        <section class="py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h1 class="fw-bold">Explore Good Places</h1>
                    <p class="text-muted">At vero eos et accusamus et lusto odio dignissimos ducimus qui
                        blanditis<br>proesentum voluptatum deleniti atque corrupti quos dolores</p>
                </div>

                <div class="row">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="col-md-4">
                            <div class="card property-card h-100">
                                <a href="{{route('house_detail')}}" class="text-decoration-none text-reset stretched-link">

                                    <div class="property-image">
                                        <span>600 × 600</span>
                                    </div>
                                    <div class="card-body">

                                        <span class="property-type bg-danger mb-2 d-inline-block">Rent</span>
                                        <h3>4,760 Birr / Month</h3>
                                        <p class="text-muted">1025 West 19th Street</p>
                                        <div class="mb-3 property-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="ms-1">(9 Reviews)</span>
                                        </div>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fas fa-bed me-1"></i> 4 Beds</li>
                                            <li class="list-inline-item"><i class="fas fa-bath me-1"></i> 2 Bath</li>
                                            <li class="list-inline-item"><i class="fas fa-arrows"></i> 447 m²</li>
                                        </ul>
                                    </div>

                                </a>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </section>

</x-app-layout>