<form action="{{ isset($salesman) ? route('salesmen.update', $salesman) : route('salesmen.store') }}" method="POST"
    enctype="multipart/form-data" role="form" onkeydown="return event.key != 'Enter';">
    @csrf
    @isset($salesman)
        @method('PUT')
    @endisset
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch mb-3">
            <x-card>
                <div class="card-title h4 text-muted">@lang('Sales Man')</div>

                <x-input label="Sales Man Name" name="salesman_name"
                    value="{{ old('salesman_name', isset($salesman) ? $salesman->salesman_name : '') }}" />

                <x-select label="Categories" name="category">
                    @isset($categories)
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    @else
                        <option value="available">@lang('Category 1')</option>
                        <option value="unavailable">@lang('Category 2')</option>
                    @endisset
                </x-select>

                <x-number-input label="Quantiy" name="quantity"
                    value="{{ old('quantity', isset($salesman) ? $salesman->quantity : '') }}" />

                <x-input label="Stock" name="stock"
                    value="{{ old('stock', isset($salesman) ? $salesman->stock : '') }}" />

                <x-number-input label="Retail Price" name="retail_price"
                    value="{{ old('retail_price', isset($salesman) ? $salesman->retail_price : '') }}" />
            </x-card>
        </div>
    </div>

    <div class="mb-3">
        <x-save-btn>
            @lang(isset($salesman) ? 'Update Item' : 'Save Item')
        </x-save-btn>
    </div>
</form>
