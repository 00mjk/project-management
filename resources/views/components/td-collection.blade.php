<td @if($collection->isEmpty()) class="text-muted" @endif>
    @if(!$collection->isEmpty())
        <ul class="list-inline mb-0">
            @foreach($collection as $item)
                <li class="list-inline-item"><span class="badge badge-pill badge-info">{{ $item->$field }}</span></li>
            @endforeach
        </ul>
    @else
        (empty)
    @endif
</td>