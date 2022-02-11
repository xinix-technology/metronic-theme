
<select class="form-control multi_reference select2" name="{{ isset($name) ? $name : $self['name'] }}[]" multiple>
    @foreach ($self->optionData() as $key => $entry)
        <option value="{{ $self->optionValue($key,$entry) }}" {{ (!empty($value[$self->optionValue($key,$entry)]) ? 'selected' : '') }}>
            {{ $self->optionLabel($key,$entry) }}
        </option>
    @endforeach
</select>