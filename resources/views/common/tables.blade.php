<x-app-layout>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="page-content-wrapper pt-30 radius-20">
                    <div class="container-fluid px-4 py-3">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div
                                    class="page-title-box d-sm-flex align-items-center justify-content-between border-bottom mb-20">
                                    <div class="page-title-left">
                                        <h5 class="mb-sm-0 ms-1 fw-bold">{{$pageTitle}}</h5>
                                    </div>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                                    title="{{ __('Dashboard') }}">{{ __('Dashboard') }}</a></li>
                                            <li class="breadcrumb-item">{{ __('Profile') }}</li>
                                            <li class="breadcrumb-item active" aria-current="page">{{ $pageTitle }}</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{  $dataTable->table(['class' => 'table table-striped table-hover w-100'],false) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
</x-app-layout>