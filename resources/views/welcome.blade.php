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


        <section class="py-5 explore-section">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Explore Good Places</h2>
                    <p class="text-muted">At vero eos et accusamus et lusto odio dignissimos ducimus qui
                        blanditis<br>proesentum voluptatum deleniti atque corrupti quos dolores</p>
                </div>

                <div class="row">
                    <!-- Property 1 -->
                    <div class="col-md-4">
                        <div class="card property-card h-100">
                            <div class="property-image">
                                <span>600 × 600</span>
                            </div>
                            <div class="card-body">
                                <span class="property-type bg-danger mb-2">Rent</span>
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
                        </div>
                    </div>

                    <!-- Property 2 -->
                    <div class="col-md-4">
                        <div class="card property-card h-100">
                            <div class="property-image">
                                <span>600 × 600</span>
                            </div>
                            <div class="card-body">
                                <span class="property-type bg-success mb-2">Rent</span>
                                <h3>25,333 Birr / Month</h3>
                                <p class="text-muted">6007 Applegate Lane</p>
                                <div class="property-rating mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="ms-1">(7 Reviews)</span>
                                </div>
                                <ul class="list-inline">
                                    <li class="list-inline-item"><i class="fas fa-bed me-1"></i> 1 Beds</li>
                                    <li class="list-inline-item"><i class="fas fa-bath me-1"></i> 4 Bath</li>
                                    <li class="list-inline-item"><i class="fas fa-arrows"></i> 298 m²</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Property 3 -->
                    <div class="col-md-4">
                        <div class="card property-card h-100">
                            <div class="property-image">
                                <span>600 × 600</span>
                            </div>
                            <div class="card-body">
                                <span class="property-type bg-danger mb-2">Rent</span>
                                <h3>8,467 Birr / Month</h3>
                                <p class="text-muted">2721 Lindsay Avenue</p>
                                <div class="property-rating mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="ms-1">(10 Reviews)</span>
                                </div>
                                <ul class="list-inline">
                                    <li class="list-inline-item"><i class="fas fa-bed me-1"></i> 3 Beds</li>
                                    <li class="list-inline-item"><i class="fas fa-bath me-1"></i> 2 Bath</li>
                                    <li class="list-inline-item"><i class="fas fa-ruler-combined me-1"></i> 283 m²</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

</x-app-layout>