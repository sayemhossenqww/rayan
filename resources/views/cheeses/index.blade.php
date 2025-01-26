@extends('layouts.app')
@section('title', __('Cheese and Labneh'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">@lang('Cheese and Labneh')</div>
        <a href="{{ route('cheeses.create') }}" class="btn btn-primary">@lang('Create')</a>
        <a href="{{ route('cheeses.print') }}" class="btn btn-success mx-2">@lang('Print')</a>
    </div>
    <div class="card w-100">
        <div class="card-body">
            <div class="mb-3">
                <form action="{{ route('cheeses.index') }}" role="form">
                    <input type="search" name="search_query" value="{{ Request::get('search_query') }}"
                        class="form-control w-auto" placeholder="@lang('Search...')" autocomplete="off">
                </form>
            </div>
            <div class=" table-responsive">
                <table class="table table-hover table-striped table-hover-x">
                    <thead>
                        <tr>
                            <th>@lang('Name')</th>
                            <th>@lang('Order')</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        @foreach ($cheeses as $cheese)
                            <tr>
                                <td class="align-middle fw-bold py-3">{{ $cheese->name }} - {{ $cheese->unit }} </td>
                                <td class="align-middle fw-bold">{{ $cheese->order }} </td>
                                
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
                                                    href="{{ route('cheeses.edit', $cheese) }}">
                                                    @lang('Edit')
                                                </a>
                                            </li>
                                            @can_edit
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <form
                                                        action="{{ route('cheeses.destroy', $cheese) }}"
                                                        method="POST" id="form-{{ $cheese->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="btn btn-link p-0 m-0 w-100 text-start text-decoration-none text-danger"
                                                            onclick="submitDeleteForm('{{ $cheese->id }}')">
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
                @if ($cheeses->isEmpty())
                    <x-no-data />
                @endif
            </div>
            <div class="">
                {{ $cheeses->withQueryString()->links() }}
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
