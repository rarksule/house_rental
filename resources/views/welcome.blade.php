<x-app-layout>
    <div class="welcome">
        <section class="hero-section">
            <div class="container text-center">
                <h1 class="display-4 fw-bold mb-4">Find Your Perfect Home in JIGJIGA</h1>
                <p class="lead mb-5">From as low as 1999 birr per month with limited time offer</p>

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="bg-white rounded p-4 d-flex flex-wrap justify-content-center search-options">
                            <div class="form-check form-check-inline mx-3 my-2">
                                <div class="filter-item">
                                    <select class="form-select" id="neighborhood">
                                        <option selected>Select Neighborhood</option>
                                        <option>Downtown</option>
                                        <option>Suburb</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-check form-check-inline mx-3 my-2">
                                <select class="form-select" id="category">
                                    <option selected>Select Category</option>
                                    <option>Restaurants</option>
                                    <option>Shops</option>
                                </select>
                            </div>
                            <div class="form-check form-check-inline mx-3 my-2">
                                <select class="form-select" id="city">
                                    <option selected>Select City</option>
                                    <option>New York</option>
                                    <option>Los Angeles</option>
                                </select>
                            </div>
                            <button class="btn btn-primary px-4 my-2">Search</button>
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
                                <a href="{{route('tenant.house_detail')}}"
                                    class="text-decoration-none text-reset stretched-link">

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