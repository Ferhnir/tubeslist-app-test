<tbody>
    @foreach($tubesStatus as $tubeStatus)
    <tr>
        <td class="text-left">{{ $tubeStatus->name }}</td>
        <td class="text-left">{{ $tubeStatus->lineStatuses[0]->statusSeverityDescription }}</td>
        <td>
            <a href="{{ route('travel.show', [ 'tube_id' => $tubeStatus->id ]) }}">Read more</a>
        </td>
    </tr>
    @endforeach
</tbody>