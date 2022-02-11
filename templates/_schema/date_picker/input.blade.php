<div class="input-group date date-picker-bono" date-format="{{ $self->date_format }}" data-value="{{ $value }}">
    <input type="text" class="form-control" >
    <input type="hidden" name="{{ $self['name'] }}" value="{{ $value }}" />
    <div class="input-group-append">
        <button class="btn btn-primary" type="button">
            <i class="la la-calendar"></i>
        </button>
    </div>
</div>