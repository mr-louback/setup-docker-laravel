<x-mail::message>
    # Dúvida respondida

    Assunto da dúvida {{ $reply->support_id }} foi respondida ás {{$reply->created_at}}.
    <x-mail::button :url="route('replies.index', $reply->support_id)">
        Ver
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
