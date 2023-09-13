<h1>Listagem do supports</h1>
<table>
    <thead>
        <th>assunto</th>
        <th>status</th>
        <th>decrição</th>
    </thead>
    <tbody>
        @foreach ($supports as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ $support->status }}</td>
                <td>{{ $support->body }}</td>
                <td>
                    <a href="{{ route('supports.show', $support->id []) }}">Ir</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('supports.create') }}">Criar dúvida</a>
