<form action="{{ isset($coffee_bag) ? route('manupack.update', $coffee_bag) : route('manupack.store') }}" method="POST"
    enctype="multipart/form-data" role="form" onkeydown="return event.key != 'Enter';">
    @csrf
    @isset($coffee_bag)
        @method('PUT')
    @endisset
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch mb-3">
            <x-card>
                <div class="card-title h4 text-muted">@lang('Coffee Data')</div>

                <!-- Big Bag (60Kg) Number -->
                <div class="mb-3 row">
                    <label for="bbag_num" class="col-form-label col-sm-4">Big Bag(60Kg) Number</label>
                    <div class="col-sm-8">
                        <input type="number" id="bbag_num" name="bbag_num" class="form-control"
                            value="{{ old('bbag_num', isset($coffee_bag) ? $coffee_bag->bbag_num : '') }}" oninput="valueChanged()" />
                    </div>
                </div>

                <!-- Jar (30Kg) Number -->
                <div class="mb-3 row">
                    <label for="jar_num" class="col-form-label col-sm-4">Jar(30Kg) Number</label>
                    <div class="col-sm-8">
                        <input type="number" id="jar_num" name="jar_num" class="form-control"
                            value="{{ old('jar_num', isset($coffee_bag) ? $coffee_bag->jar_num : '') }}" />
                    </div>
                </div>

                <!-- Total Amount (g) -->
                <div class="mb-3 row">
                    <label for="total_amount" class="col-form-label col-sm-4">Total Amount(g)</label>
                    <div class="col-sm-8">
                        <input type="text" id="total_amount" name="total_amount" class="form-control" disabled/>
                        <input type="text" id="total_amount_hidden" name="total_amount_hidden" class="form-control" hidden/>
                    </div>
                </div>

                <!-- Total Loss (g) -->
                <div class="mb-3 row">
                    <label for="total_loss" class="col-form-label col-sm-4">Total Loss(g)</label>
                    <div class="col-sm-8">
                        <input type="text" id="total_loss" name="total_loss" class="form-control" disabled/>
                        <input type="text" id="total_loss_hidden" name="total_loss_hidden" class="form-control" hidden/>
                    </div>
                </div>

                <!-- Bag Type -->
                <div class="mb-3 row">
                    <label for="bag_type" class="col-form-label col-sm-4">Bag Type</label>
                    <div class="col-sm-8">
                        <select id="bag_type" name="bag_type" class="form-select">
                            <!-- @isset($categories)
                                @foreach ($categories as $category)
                                    <option value="{{ $category->name }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            @else -->
                                <option value="available">@lang('400g-bag')</option>
                                <option value="unavailable">@lang('180g-bag')</option>
                            <!-- @endisset -->
                        </select>
                    </div>
                </div>

                <!-- Number of Bags -->
                <div class="mb-3 row">
                    <label for="nob" class="col-form-label col-sm-4">Number of Bags</label>
                    <div class="col-sm-8">
                        <input type="number" id="nob" name="nob" class="form-control"
                            value="{{ old('nob', isset($coffee_bag) ? $coffee_bag->nob : '') }}" />
                    </div>
                </div>
            </x-card>
        </div>
    </div>

    <div class="mb-3">
        <x-save-btn>
            @lang(isset($coffee_bag) ? 'Update Item' : 'Save Data')
        </x-save-btn>
    </div>
</form>

@isset($coffee_bag)
    <div class="modal" id="removeCategoryImageModal" tabindex="-1" aria-labelledby="removeCategoryImageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="removeCategoryImageModalLabel">@lang('Are you sure?')</h5>
                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('products.image.destroy', $coffee_bag) }}" method="POST" role="form">
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
@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bbagNumInput = document.getElementById('bbag_num');
            const jarNumInput = document.getElementById('jar_num');
            const totalAmountInput = document.getElementById('total_amount');
            const totalLossInput = document.getElementById('total_loss');
            const totalAmountInputHidden = document.getElementById('total_amount_hidden');
            const totalLossInputHidden = document.getElementById('total_loss_hidden');
            const nobInput = document.getElementById('nob');
            const bagTypeSelect = document.getElementById('bag_type');

            function updateValues() {
                const bbagNum = parseFloat(bbagNumInput.value) || 0;
                const jarNum = parseFloat(jarNumInput.value) || 0;

                // Update total amount (example calculation)
                const totalAmount = (bbagNum * 6000) + (jarNum * 3000);
                totalAmountInput.value = totalAmount;
                totalAmountInputHidden.value = totalAmount;

                // Update total loss (example calculation)
                const totalLoss = totalAmount * 0.2;
                totalLossInput.value = totalLoss;
                totalLossInputHidden.value = totalLoss;

                // Update number of bags (example calculation)
                const bagType = bagTypeSelect.value;
                let nob = 0;
                if (bagType === 'available') {
                    nob = Math.ceil((totalAmount - totalLoss)/400);
                } else if (bagType === 'unavailable') {
                    nob = Math.ceil((totalAmount - totalLoss)/180);
                }
                nobInput.value = nob;
            }

            bbagNumInput.addEventListener('input', updateValues);
            jarNumInput.addEventListener('input', updateValues);
            bagTypeSelect.addEventListener('change', updateValues);

            // Initial update
            updateValues();
        });
    </script>
@endpush

