<div class="image-input image-input-outline image-input-empty" id="kt_image" style="background-image: url('{{ Theme::base('assets/media/users/blank.png') }}')" data-url="{{ $url }}" data-bucket="{{ $self['bucket'] }}">
    <div class="image-input-wrapper"></div>
    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change {{ $self['name'] }}">
        <i class="fa fa-pen icon-sm text-muted"></i>
        <input type="file"  class="file-upload" accept=".png, .jpg, .jpeg" />
        @if(count($value) > 0)
        <input type="hidden" name="{{ $self['name'] }}" id="{{ $self['name'] }}" value='{{ json_encode($value) }}'/>
        @else
        <input type="hidden" name="{{ $self['name'] }}" id="{{ $self['name'] }}" />
        @endif
    </label>
    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Remove {{ $self['name'] }}">
        <i class="ki ki-bold-close icon-xs text-muted"></i>
    </span>
</div>
