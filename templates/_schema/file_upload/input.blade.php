<fileupload class="fileupload fileupload-new"  data-url="{{ $url }}" data-bucket="{{ $self['bucket'] }}">
    <div class="input-group">
        <div class="form-control" >
            <i class="fa fa-file fileinput-exists"></i>&nbsp;
            <span class="fileupload-filename"> </span>
            @if(count($value) > 0)
                <input type="hidden" name="{{ $self['name'] }}" id="{{ $self['name'] }}" value='{{ json_encode($value) }}'/>
            @else
                <input type="hidden" name="{{ $self['name'] }}" id="{{ $self['name'] }}" />
            @endif
        </div>
        <input type="file"> 
        <span class="input-group-append" >
            <a href="javascript:;" type="button" class="btn btn-danger fileupload-exists" data-dismiss="fileinput"> Remove </a>
            <button type="button" class="btn btn-primary " >
                <span class="spinner">
                    <i class="fa fa-spinner fa-spin"></i>
                </span>
                <span class="label-spinner">
                    <span class="fileupload-new"> Select file </span>
                    <span class="fileupload-exists"> Change </span>
                <span>
            </button>
        </span>
    </div>
</fileupload>