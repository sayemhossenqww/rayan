<form action="{{ route('margarine.update', $margarine) }}" method="POST" role="form">
    @csrf
    @isset($margarine)
        @method('PUT')
    @endisset

    <input type="hidden" name="day" value="{{$day}}" />
        
    @foreach ($fields1 as $key => $value)        
        <x-input label="{{$value}}" name="{{$key}}"
            value="{{ old($key, isset($margarine) ? $margarine[$key.'_'.$day] : '') }}" />
    @endforeach
    
    <div class="mb-3">
        <x-save-btn>
            @lang(isset($margarine) ? 'Update Margarine' : 'Save Margarine')
        </x-save-btn>
    </div>
</form>
