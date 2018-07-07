<td @if(!$value) class="text-muted" @endif>
    @if($value)
        {{ $value }}
    @else
        (empty)
    @endif
</td>