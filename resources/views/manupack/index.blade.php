@extends('layouts.app')
@section('title', __('Manufacturing and packaging'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="flex-grow-1">
            <x-page-title>@lang('Manufacturing and packaging')</x-page-title>
        </div>
        <a href="{{ route('manupack.create') }}"
            class="btn btn-primary btn-ic @if (!Auth::user()->can_create) disabled @endif">
            <x-heroicon-o-plus class="hero-icon-sm me-2 text-white" />
            @lang('Add Data')
        </a>
    </div>

    <x-card>
        <x-table id="categories-table">
            <x-thead>
                <tr>
                    <x-th>@lang('Product Type')</x-th>
                    <x-th>@lang('Big bag Number')</x-th>
                    <x-th>@lang('Jar Number')</x-th>
                    <x-th>@lang('Total Amount(g)')</x-th>
                    <x-th>@lang('Total Loss(g)')</x-th>
                    <x-th>@lang('400g-bag Number')</x-th>
                    <x-th>@lang('180g-bag Number')</x-th>
                    <x-th></x-th>
                </tr>
            </x-thead>
        </x-table>
    </x-card>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            let dataTable = $('#categories-table').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    url: '{{ asset("datatables/i18n/{$settings->lang}.json") }}',
                },
                ajax: {
                    url: "{{ route('api.manupack.index') }}",
                    dataSrc: 'data'
                },
                columns: [{
                        data: "product_type",
                    },
                    {
                        data: 'bbag_num'
                    },
                    {
                        data: "jar_num",
                    },
                    {
                        data: "total_amount",
                    },
                    {
                        data: function(data, type, dataToSet) {
                            // Calculate total_loss as total_amount - (total_amount * 0.2)
                            const totalLoss = (data.total_amount * 0.2);
                            return totalLoss.toFixed(1); // Format to 2 decimal places if needed
                        },
                    },
                    {
                        data: "bigcon_num",
                    },
                    {
                        data: "smallcon_num",
                    },
                    {
                        orderable: false,
                        data: function(data, type, dataToSet) {
                            var editUrl = "{{ route('manupack.edit', ':id') }}";
                            var deleteUrl = "{{ route('manupack.destroy', ':id') }}";
                            editUrl = editUrl.replace(':id', data.id);
                            deleteUrl = deleteUrl.replace(':id', data.id);
                            return `<div class="dropdown d-flex">` +
                                `<button class="btn btn-link  text-black p-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">` +
                                `<x-heroicon-o-ellipsis-horizontal class="hero-icon" />` +
                                `</button>` +
                                `<x-dropdown-menu class="dropdown-menu-end" aria-labelledby="dropdownMenuButton1">` +
                                `<x-dropdown-item href="${editUrl}">` +
                                `<x-heroicon-o-pencil class="hero-icon-sm me-2 text-gray-400" />` +
                                `@lang('Edit')` +
                                `</x-dropdown-item>` +
                                `<x-dropdown-item href="#">` +
                                `<form action="${deleteUrl}" method="POST" id="form-${data.id}">` +
                                `@csrf` +
                                `@method('DELETE')` +
                                `<button type="button" class="btn btn-link p-0 m-0 w-100 text-start text-decoration-none text-danger align-items-center btn-sm" onclick="submitDeleteForm('${data.id}')">` +
                                `<x-heroicon-o-trash class="hero-icon-sm me-2 text-gray-400" />` +
                                `@lang('Delete')` +
                                `</button>` +
                                `</form>` +
                                `</x-dropdown-item>` +
                                `</x-dropdown-menu>` +
                                `</div>`

                        }
                    },

                ]
            });
        });


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
