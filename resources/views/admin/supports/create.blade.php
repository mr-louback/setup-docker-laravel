<h1>Nova dúvida</h1>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif
<form action="{{ route('supports.store') }}" method="post">
    {{-- <input type="hidden" value="{{ csrf_token() }}" name="_token"> --}}
    @csrf()
    <input type="text" placeholder="Assunto" value="{{old('subject')}}" name="subject">
    <textarea name="body" cols="30" rows="5">{{old('body')}}</textarea>
    <button type="submit">Enviar</button>
</form>
