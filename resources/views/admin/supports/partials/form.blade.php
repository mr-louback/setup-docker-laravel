@csrf()
<input type="text" placeholder="Assunto" value="{{ $support->subject ?? old('subject') }}" name="subject">
<textarea name="body" cols="30" rows="5">{{ $support->body ?? old('body') }}</textarea>
<button type="submit">Enviar</button>
