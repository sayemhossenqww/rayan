<form action="{{route('attendances.update', $attendance)}}" method="POST" role="form">
    @csrf
    @isset($attendance)
        @method('PUT')
    @endisset
    <div class="row">
        <input name="day" type="hidden" value="{{$day}}" />
        <div class="col-md-6">
            <x-input label="In" name="in" type="time"
                value="{{ old('in_'.$day, isset($attendance) ? $attendance['in_'.$day] : '') }}" />
        </div>
        <div class="col-md-6">
            <x-input label="Out" name="out" type="time"
                value="{{ old('out_'.$day, isset($attendance) ? $attendance['out_'.$day] : '') }}" />
        </div>
    </div>

    <div class="mb-3">
        <x-save-btn>
            @lang('Update Attendance')
        </x-save-btn>
    </div>
</form>
