@extends('layouts.app')
@section('title', __('Items'))

@section('content')

    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="flex-grow-1">
            <x-page-title>@lang('Items')</x-page-title>
        </div>
        <a href="{{ route('products.create') }}"
            class="btn btn-primary btn-ic @if (!Auth::user()->can_create) disabled @endif">
            <x-heroicon-o-plus class="hero-icon-sm me-2 text-white" />
            @lang('Add Item')
        </a>
    </div>
    <x-card>
        <x-table id="products-table">
            <x-thead>
                <tr>
                    <x-th>@lang('Item')</x-th>
                    <x-th>@lang('Description')</x-th>
                    <x-th>@lang('Expiry Date')</x-th>
                    <x-th>@lang('Category')</x-th>
                    <x-th>@lang('Cost')</x-th>
                    <x-th>@lang('Whole Costs')</x-th>
                    <x-th>@lang('Unit Price')</x-th>
                    <x-th>@lang('WholeUnit Prices')</x-th>
                    <x-th>@lang('Box Price')</x-th>
                    <x-th>@lang('WholeBox Prices')</x-th>
                    {{-- <x-th>@lang('Wholesale Price')</x-th> --}}
                    {{-- <x-th>@lang('Price per Gram')</x-th>
                    <x-th>@lang('Price per Kilogram')</x-th> --}}
                    <x-th>@lang('In Stock')</x-th>
                    <x-th>@lang('status.text')</x-th>
                    <x-th></x-th>
                </tr>
            </x-thead>
        </x-table>
        {{-- <x-table>
            <tfoot>
                <tr>
                    <th>Sum Total :</th>
                    <th></th>
                    <th></th>
                    <th>{{$total_cost}}</th>
                    <th>{{$total_whole_cost}}</th>
                    <th>{{$total_unit_price}}</th>
                    <th>{{$total_whole_unit_price}}</th>
                    <th>{{$total_box_price}}</th>
                    <th>{{$total_whole_box_price}}</th>
                    <th>{{$total_in_stock}}</th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </x-table> --}}
        <div class="row">
            <div class="col-12">
                <div style="text-align: right;">
                    <span class="fw-bold">SUM COSTS </span> {{ $total_cost }}
                    <span class="fw-bold">SUM PRICES </span> {{ $total_unit_price }}
                </div>
            </div>
        </div>
    </x-card>
@endsection
@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            let dataTable = $('#products-table').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    url: '{{ asset("datatables/i18n/{$settings->lang}.json") }}',
                },
                ajax: {
                    url: "{{ route('api.products.index') }}",
                    dataSrc: 'data'
                },
                columns: [{
                        data: "name",
                        render: function(data, type, row) {
                            return '<div class=" d-flex align-items-center">' +
                                `<img src="${ row.image}" class="rounded me-2" height="35" alt="${ row.name}">` +
                                `<div class="fw-bold">${ row.name}</div>` +
                                `</div>`
                        }
                    },
                    {
                        data: 'description',
                        orderable: false
                    },
                    {
                        data: 'expiry_date'
                    },
                    {
                        data: 'category',
                        orderable: false
                    },
                    {
                        data: 'cost'
                    },
                    {
                        data: 'whole_cost'
                    },
                    {
                        data: 'unit_price'
                        // data: 'sale_price'
                    },
                    {
                        data: 'wholeunit_price'
                        // data: 'sale_price'
                    },
                    {
                        data: 'box_price'
                        // data: 'sale_price'
                    },
                    {
                        data: 'wholebox_price'
                    },
                    // {
                    //     data: 'wholesale_price'
                    // },
                    // {
                    //     data: 'price_per_gram'
                    // },
                    // {
                    //     data: 'price_per_kilogram'
                    // },
                    {
                        data: 'in_stock'
                    },
                    {
                        data: "is_active",
                        render: function(data, type, row) {
                            return `<span class="badge rounded-0 text-uppercase text-xs fw-normal ${row.status_badge_bg_color}">${row.status}</span>`
                        }
                    },
                    {
                        orderable: false,
                        data: function(data, type, dataToSet) {
                            var editUrl = "{{ route('products.edit', ':id') }}";
                            var deleteUrl = "{{ route('products.destroy', ':id') }}";
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

                ],
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
