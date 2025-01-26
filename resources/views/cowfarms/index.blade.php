@extends('layouts.orderapp')
@section('title', __('Cow Farm'))

@section('content')
    <div class="mb-3 h4">
        @lang('Cow Farm')
    </div>

    <div class="row">
        <div class="col-md-2 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>

                    <h3>@lang('Milk production')</h3>
                    <a href="#" class="stretched-link" data-bs-toggle="modal" data-bs-target="#statesModal"></a>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                    </svg>


                    <h3>@lang('Buying feed')</h3>
                    <a href="{{ route('orders.analytics') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <h3>@lang('Selling calves and selling manure')</h3>
                    <a href="{{ route('sales.index') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <h3>@lang('Selling beef cattle')</h3>
                    <a href="{{ route('sales.index') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <h3>@lang('Veterinarians')</h3>
                    <a href="{{ route('sales.index') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <h3>@lang('Fuel')</h3>
                    <a href="{{ route('sales.index') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>

                    <h3>@lang('Workers` rent')</h3>
                    <a href="#" class="stretched-link" data-bs-toggle="modal" data-bs-target="#statesModal"></a>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                    </svg>


                    <h3>@lang('Factory')</h3>
                    <a href="{{ route('orders.analytics') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <h3>@lang('Buying mi')</h3>
                    <a href="{{ route('sales.index') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <h3>@lang('Buying cheese')</h3>
                    <a href="{{ route('sales.index') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <h3>@lang('Buying yogurt')</h3>
                    <a href="{{ route('sales.index') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <h3>@lang('Maintenance and preparation')</h3>
                    <a href="{{ route('sales.index') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>

                    <h3>@lang('Buying raw materials')</h3>
                    <a href="#" class="stretched-link" data-bs-toggle="modal" data-bs-target="#statesModal"></a>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                    </svg>


                    <h3>@lang('Shop')</h3>
                    <a href="{{ route('orders.analytics') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <h3>@lang('Buying and selling')</h3>
                    <a href="{{ route('sales.index') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <h3>@lang('Rent (workers) and fuel')</h3>
                    <a href="{{ route('sales.index') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <h3>@lang('Maintenance and preparation')</h3>
                    <a href="{{ route('sales.index') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
        <div class="col-md-2 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <h3>@lang('Tomatoes, salt, and jars')</h3>
                    <a href="{{ route('sales.index') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 mb-3 d-flex align-items-stretch">
            <div class="card w-100 clickable-cell border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" style="width: 7rem;height:7rem;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>

                    <h3>@lang(' Pressed labneh and pressed kishk for 1 kilogram jar')</h3>
                    <a href="#" class="stretched-link" data-bs-toggle="modal" data-bs-target="#statesModal"></a>
                </div>
            </div>
        </div>
    </div>
@endsection
