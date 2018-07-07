<li class="list-group-item">
    {{ $label }}:
    @if($value)
        {{ $value }}
    @else
        <span class="text-muted">(empty)</span>
    @endif
</li>