<div class="input-group searchreference" data-url="{{ URL::site(strtolower($self['foreign']).'.json'); }}" data-title="{{ $self['label'] }}" data-label="{{ $self['foreignLabel'] }}" data-key="{{ $self['foreignKey'] }}" data-field='{{ json_encode($self['field']); }}'>
    <input type="text" class="form-control" value="{{ $label }}">
    <input type="hidden" class="product" name="{{ $self['name'] }}" value="{{ $value }}" data-entry=""/>
    <span class="input-group-append">
        <button class="btn btn-danger btn-clear" type="button">
            <i class="la la-close"></i>
        </button>
        <button class="btn btn-primary btn-search" type="button">
            <i class="la la-search"></i>
        </button>
    </span>
</div>