<form action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" method="POST"
    enctype="multipart/form-data" role="form" onkeydown="return event.key != 'Enter';">
    @csrf
    @isset($product)
        @method('PUT')
    @endisset
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch mb-3">
            <x-card>
                <div class="card-title h4 text-muted">@lang('Sales Man')</div>

                <x-number-input label="Quantiy" name="name"
                    value="{{ old('name', isset($product) ? $product->name : '') }}" />

                <x-input label="Stock" name="name"
                    value="{{ old('name', isset($product) ? $product->name : '') }}" />

                <x-select label="Categories" name="status">
                    @isset($categories)
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    @else
                        <option value="available">@lang('Category 1')</option>
                        <option value="unavailable">@lang('Category 2')</option>
                    @endisset
                </x-select>

                <x-number-input label="Retail Price" name="name"
                    value="{{ old('name', isset($product) ? $product->name : '') }}" />
            </x-card>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 d-flex align-items-stretch">
            <x-card class="mb-3">
                <div class="card-title h4 text-muted">@lang('Way for Sales Man')</div>

                <div class="row">
                    <div class="col-md-8">
                        <x-select label="Roots" name="root">
                            @isset($roots)
                                <p>{{ $roots }}</p>
                                @foreach ($roots as $root)
                                    <option value="{{ $root->id }}" {{ old('root') == $root->id ? 'selected' : '' }}>
                                        {{ $root->root_name }}
                                    </option>
                                @endforeach
                            @else
                                <option value="available">@lang('Category 1')</option>
                                <option value="unavailable">@lang('Category 2')</option>
                            @endisset
                        </x-select>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end">
                        <button id="saveButton" type="button" class="btn btn-primary mx-3 mt-3 align-self-start custom-button">
                            @lang('Add')
                        </button>
                    </div>
                </div>

                <x-number-input label="Root Numbers" name="root_numbers"
                    value="{{ old('unit_price', isset($product) ? $product->unit_price : '') }}" />

                <x-input label="Sales Man Name" name="sales_man_name"
                    value="{{ old('cost_unit', isset($product) ? $product->cost_unit : '') }}" />
            </x-card>
        </div>
        <div class="col-md-6 d-flex align-items-stretch">
            <x-card class="mb-3">
                <div class="card-title h4 text-muted">@lang('Line')</div>

                <x-input label="Location" name="location"
                    value="{{ old('in_stock', isset($product) ? $product->in_stock : '') }}" />

                <x-input label="Zoom" name="zoom"
                    value="{{ old('in_stock', isset($product) ? $product->in_stock : '') }}" />

                <x-input label="Customer Name" name="customer_name"
                    value="{{ old('in_stock', isset($product) ? $product->in_stock : '') }}" />

            </x-card>
        </div>
    </div>

    <div class="mb-3">
        <x-save-btn>
            @lang(isset($product) ? 'Update Item' : 'Save Item')
        </x-save-btn>
    </div>
</form>

@isset($product)
    <div class="modal" id="removeCategoryImageModal" tabindex="-1" aria-labelledby="removeCategoryImageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="removeCategoryImageModalLabel">@lang('Are you sure?')</h5>
                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('products.image.destroy', $product) }}" method="POST" role="form">
                    <div class="modal-body">
                        @csrf
                        @method('DELETE')
                        @lang('You cannot undo this action!')
                    </div>
                    <div class="row p-0 m-0 border-top">
                        <div class="col-6 p-0">
                            <button type="button"
                                class="btn btn-link w-100 m-0 text-danger btn-lg text-decoration-none rounded-0 border-end"
                                data-bs-dismiss="modal">@lang('Cancel')</button>
                        </div>
                        <div class="col-6 p-0">
                            <button type="submit"
                                class="btn btn-link w-100 m-0 text-black btn-lg text-decoration-none rounded-0 border-start">
                                @lang('Remove Image')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endisset
<script>
    document.getElementById('saveButton').addEventListener('click', function() {
        window.location.href = "{{ route('salesman.create') }}";
    });
</script>
