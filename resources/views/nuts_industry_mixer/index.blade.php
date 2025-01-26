@extends('layouts.app')
@section('title', __('Nuts Industry Mixer'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">@lang('Nuts Industry Mixer')</div>
        <a href="{{ route('nuts-industry-mixer.create') }}" class="btn btn-primary">@lang('Create')</a>
        <a href="{{ route('nuts-industry-mixer.print') }}" class="btn btn-success mx-2">@lang('Print')</a>
    </div>
    <div class="card w-100">
        <div class="card-body">
            <div class="mb-3">
                <form action="{{ route('nuts-industry-mixer.index') }}" role="form">
                    <input type="search" name="search_query" value="{{ Request::get('search_query') }}"
                        class="form-control w-auto" placeholder="@lang('Search...')" autocomplete="off">
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-hover-x">
                    <thead>
                        <tr>
                            <th>@lang('Type of Nuts')</th>
                            <th>@lang('Quantity of Pistachio')</th>
                            <th>@lang('Quantity of Regular cashew')</th>
                            <th>@lang('Quantity of Smoked cashew')</th>
                            <th>@lang('Quantity of Hazelnut')</th>
                            <th>@lang('Quantity of Regular almond')</th>
                            <th>@lang('Quantity of Smoked almond')</th>
                            <th>@lang('Quantity of White seed')</th>
                            <th>@lang('Quantity of Freekeh almond')</th>
                            <th>@lang('Final Quantity')</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        @foreach ($mounehIndustries as $mounehIndustry)
                            <tr>
                                <td class="align-middle fw-bold py-3">{{ $mounehIndustry->type_of_nuts }}</td>
                                <td class="align-middle fw-bold">{{ $mounehIndustry->quantity_of_pistachio }}</td>
                                <td class="align-middle fw-bold">{{ $mounehIndustry->quantity_of_regular_cashew }}</td>
                                <td class="align-middle fw-bold">{{ $mounehIndustry->quantity_of_smoked_cashew }}</td>
                                <td class="align-middle fw-bold">{{ $mounehIndustry->quantity_of_hazelnut }}</td>
                                <td class="align-middle fw-bold">{{ $mounehIndustry->quantity_of_regular_almond }}</td>
                                <td class="align-middle fw-bold">{{ $mounehIndustry->quantity_of_smoked_almond }}</td>
                                <td class="align-middle fw-bold">{{ $mounehIndustry->quantity_of_white_seed }}</td>
                                <td class="align-middle fw-bold">{{ $mounehIndustry->quantity_of_freekeh_almond }}</td>
                                <td class="align-middle fw-bold">{{ $mounehIndustry->final_quantity }}</td>

                                <td class="align-middle">
                                    <div class="dropdown d-flex">
                                        <button class="btn btn-link me-auto text-black p-0" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <x-heroicon-o-ellipsis-horizontal class="hero-icon" />
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end animate slideIn shadow-sm"
                                            aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('nuts-industry-mixer.edit', $mounehIndustry) }}">
                                                    @lang('Edit')
                                                </a>
                                            </li>
                                            @can_edit
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <form
                                                        action="{{ route('nuts-industry-mixer.destroy', $mounehIndustry) }}"
                                                        method="POST" id="form-{{ $mounehIndustry->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="btn btn-link p-0 m-0 w-100 text-start text-decoration-none text-danger"
                                                            onclick="submitDeleteForm('{{ $mounehIndustry->id }}')">
                                                            @lang('Delete')
                                                        </button>
                                                    </form>
                                                </a>
                                            </li>
                                            @endcan_edit
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($mounehIndustries->isEmpty())
                    <x-no-data />
                @endif
            </div>
            <div class="">
                {{ $mounehIndustries->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function submitDeleteForm(id) {
            const form = document.querySelector(`#form-${id}`);
            Swal.fire(swalConfig()).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                } else {
                    topbar.hide();
                }
            });
        }
    </script>
@endpush