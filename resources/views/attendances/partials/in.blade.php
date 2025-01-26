<form action="{{route('attendances.in', $attendance)}}" method="POST" role="form">
    @csrf
    @isset($attendance)
        @method('PUT')
    @endisset
    <div class="row">
        <input name="day" type="hidden" value="{{$day}}" />
    </div>

    <div class="mb-12">
        @if ($attendance['in_'.$day])
            <button type="submit" class="btn btn-primary w-100" disabled>
                @lang('In')
            </button>
        @else
            <button type="submit" class="btn btn-primary w-100">
                @lang('In')
            </button>
        @endif
    </div>
</form>
