<select class="select2reference select2"  name="{{ isset($name) ? $name : $self['name'] }}" data-value="{{ @$value }}">
    <option value>Select {{ $self['label'] }}</option>
    @foreach ($self->optionData() as $key => $entry)
        <option value="{{ $self->optionValue($key,$entry) }}" {{ ($self->optionValue($key,$entry) == $value ? 'selected' : '') }}>
            {{ $self->optionLabel($key,$entry) }}
        </option>
    @endforeach
</select>