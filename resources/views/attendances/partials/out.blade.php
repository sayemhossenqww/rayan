<form action="{{route('attendances.out', $attendance)}}" method="POST" role="form">
    @csrf
    @isset($attendance)
        @method('PUT')
    @endisset
    <div class="row">
        <input name="day" type="hidden" value="{{$day}}" />
    </div>

    <div class="mb-12">
        @if ($attendance['in_'.$day] && !$attendance['out_'.$day])
            <button type="submit" class="btn btn-danger w-100">
                @lang('Out')
            </button>
        @else
            <button type="submit" class="btn btn-danger w-100" disabled>
                @lang('Out')
            </button>
        @endif
    </div>
</form>
