<x-app-layout>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="page-content-wrapper bg-white p-30 radius-20">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <div class="page-title-left">
                                    <h2 class="mb-sm-0">{{ __('Dashboard') }}</h2>
                                    <p>{{ __('Welcome back') }}, {{ auth()->user()->name }} <span class="iconify font-24"
                                            data-icon="openmoji:waving-hand"></span></p>
                                </div>
                                <div class="page-title-right">
                                    <a href="{{ route('owner.property.add') }}" class="theme-btn"
                                        title="{{ __('Add Property') }}">{{ __('Add Property') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="dashboard-feature-item bg-off-white theme-border radius-4 p-20 mb-25">
                                <div
                                    class="dashboard-feature-item-icon-wrap font-20 d-flex align-items-center justify-content-center bg-white radius-4">
                                    <span class="iconify orange-color" data-icon="bxs:home-circle"></span>
                                </div>
                                <p class="mt-2">{{ __('Total Property') }}</p>
                                <h2 class="mt-1">{{ $totalProperties }}</h2>

                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="dashboard-feature-item bg-off-white theme-border radius-4 p-20 mb-25">
                                <div
                                    class="dashboard-feature-item-icon-wrap font-20 d-flex align-items-center justify-content-center bg-white radius-4">
                                    <span class="iconify primary-color" data-icon="material-symbols:garage-home"></span>
                                </div>
                                <p class="mt-2">{{ __('Total Units') }}</p>
                                <h2 class="mt-1">{{ $totalUnits }}</h2>

                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="dashboard-feature-item bg-off-white theme-border radius-4 p-20 mb-25">
                                <div
                                    class="dashboard-feature-item-icon-wrap font-20 d-flex align-items-center justify-content-center bg-white radius-4">
                                    <span class="iconify orange-color" data-icon="bi:bar-chart-line-fill"></span>
                                </div>
                                <p class="mt-2">{{ __('Total Tenants') }}</p>
                                <h2 class="mt-1">{{ $totalTenants }}</h2>

                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="dashboard-feature-item bg-off-white theme-border radius-4 p-20 mb-25">
                                <div
                                    class="dashboard-feature-item-icon-wrap font-20 d-flex align-items-center justify-content-center bg-white radius-4">
                                    <span class="iconify green-color" data-icon="bi:bar-chart-line-fill"></span>
                                </div>
                                <p class="mt-2">{{ __('Total Maintainers') }}</p>
                                {{-- <h2 class="mt-1">{{ $totalMaintainers }}</h2> --}}
                            </div>
                        </div>
                    </div>
                    <!-- dashboard-feature-item row -->

                    <!-- Chart row -->
                    <div class="row">
                        <div class="col-12 col-lg-12 col-xl-12">
                            <div class="bg-off-white radius-4 mb-25 theme-border p-20 w-100">
                                <div class="bg-transparent">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h4 class="mb-0">{{ __('Rent Overview') }}</h4>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h2>{{ $yearlyTotalAmount }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div id="chart1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Chart row -->

                    <div class="row">
                        <div class="col-lg-7">
                            <div class="dashboard-properties-table bg-off-white theme-border p-20 radius-4 mb-25">
                                <div class="">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="d-flex align-items-center justify-content-between mb-25">
                                                <h4 class="mb-0">{{ __('My Properties') }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="table theme-border p-20">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('Name') }}</th>
                                                            <th>{{ __('Units') }}</th>
                                                            <th>{{ __('Available Unit') }}</th>
                                                            <th>{{ __('Tenants') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($properties as $property)
                                                            <tr>
                                                                <td>
                                                                    <h6 class="theme-text-color">{{ $property->name }}
                                                                    </h6>
                                                                    <p class="font-13">{{ $property->address }}</p>
                                                                </td>
                                                                <td>{{ $property->number_of_unit }}</td>
                                                                <td>{{ $property->number_of_unit - $property->total_tenant }}
                                                                </td>
                                                                <td>{{ $property->total_tenant }}</td>
                                                                <td>{{ $property->total_maintainers }}</td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td class="text-center">{{ __('No data found') }}</td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>

                                                <div>
                                                    <a class="theme-link font-14 font-medium d-flex align-items-center justify-content-center mt-20"
                                                        href="{{ route('owner.property.allProperty') }}">
                                                        {{ __('View All') }}<i class="ri-arrow-right-line ms-2"></i>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
{{-- @endsection --}}

@push('script')
    {{-- <script>
        const MONTHS = @json($months);
        const INVOICEMONTLYAMOUNT = @json($invoiceMonthlyAmount);
    </script> --}}
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/index-charts.js') }}"></script>
@endpush