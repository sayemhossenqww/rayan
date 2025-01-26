<form action="{{ isset($root) ? route('salesman.update', $root) : route('salesman.store') }}" method="POST"
    enctype="multipart/form-data" role="form">
    @csrf
    @isset($root)
        @method('PUT')
    @endisset

    <div class="mb-3">
        <label for="root_name" class="form-label">@lang('Root Name')</label>
        <input type="text" name="root_name" class="form-control @error('root_name') is-invalid @enderror" id="root_name"
            value="{{ old('root_name', isset($root) ? $root->root_name : '') }}">
        @error('root_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
<!--
    <div class="mb-3">
        <label for="village_name" class="form-label">@lang('Village Name')</label>
        <input type="text" name="village_name" class="form-control @error('village_name') is-invalid @enderror" id="village_name"
            value="{{ old('village_name', isset($root) ? $root->village_name : '') }}">
        @error('village_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div> -->

    <div class="mb-3">
        <label for="area_name" class="form-label">@lang('Area Name')</label>
        <input type="text" name="area_name" class="form-control @error('area_name') is-invalid @enderror" id="area_name"
            value="{{ old('area_name', isset($root) ? $root->area_name : '') }}">
        @error('area_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="city_name" class="form-label">@lang('City Name')</label>
        <input type="text" name="city_name" class="form-control @error('city_name') is-invalid @enderror" id="city_name"
            value="{{ old('city_name', isset($root) ? $root->city_name : '') }}">
        @error('city_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <x-save-btn>
            @lang('Save Root')
        </x-save-btn>
    </div>
</form>

