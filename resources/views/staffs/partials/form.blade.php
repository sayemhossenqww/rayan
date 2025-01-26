<form action="{{ isset($staff) ? route('staffs.update', $staff) : route('staffs.store') }}" method="POST"
    enctype="multipart/form-data" role="form">
    @csrf
    @isset($staff)
        @method('PUT')
    @endisset

    <div class="mb-3">
        <label for="name" class="form-label">@lang('Employee Name')</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
            value="{{ old('name', isset($staff) ? $staff->name : '') }}">
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <x-number-input label="Order" name="order"
        value="{{ old('order', isset($staff) ? $staff->order : '') }}" />

    <div class="mb-3">
        <x-save-btn>
            @lang(isset($staff) ? 'Update Staff' : 'Save Staff')
        </x-save-btn>
    </div>
</form>
