@extends('layout')
<?php
use ROH\Util\Inflector;
?>
@section('pagetitle')
    {{ f('pagetitle', l('Create {0}', Inflector::humanize(f('controller')->getClass()))) }}
@stop

@section('sub-header')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ f('pagetitle', l('Create {0}', Inflector::humanize(f('controller')->getClass()))) }}</h5>
            <!--end::Page Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                    <a href="{{ f('controller.url') }}" class="text-muted">{{ f('pagetitle', l('{0}', Inflector::humanize(f('controller')->getClass()))) }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ f('controller.url', '/null/create') }}" class="text-muted">{{ f('pagetitle', l('Create {0}', Inflector::humanize(f('controller')->getClass()))) }}</a>
                </li>
            </ul>
            <!--end::Breadcrumb-->
            
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Button-->
            <a href="{{ f('controller.url') }}" class="btn btn-light font-weight-bold mr-2">
                <span class="svg-icon">
                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-02-01-052524/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Arrow-left.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"/>
                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
                            <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                Back
            </a>
            <button type="button" class="btn btn-light-primary font-weight-bold" onclick="$('#createform').submit ()"> 
                <span class="svg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"/>
                            <path d="M17,4 L6,4 C4.79111111,4 4,4.7 4,6 L4,18 C4,19.3 4.79111111,20 6,20 L18,20 C19.2,20 20,19.3 20,18 L20,7.20710678 C20,7.07449854 19.9473216,6.94732158 19.8535534,6.85355339 L17,4 Z M17,11 L7,11 L7,4 L17,4 L17,11 Z" fill="#000000" fill-rule="nonzero"/>
                            <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="5" rx="0.5"/>
                        </g>
                    </svg>
                </span>
                Submit
            </button>
        </div>
        <!--end::Toolbar-->
    </div>
</div>
<!--end::Subheader-->
@stop

@section('fields')

<div class="card card-custom">
    <div class="card-body">
        <!-- BEGIN FORM-->
        <form method="post"id="createform">
            @foreach (f('controller')->schema() as $name => $field)
            <div class="form-group row">
                @if (!$field['hidden'])
                <div class="col-xl-3 col-lg-3 col-form-label">
                    {{ $field->label() }}
                </div>
                <div class="col-lg-9 col-xl-9">
                    {{ $entry->format($name, 'input') }}
                </div>
                @endif
            </div>
            @endforeach
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <!--begin::Accordion-->
                    <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample6">
                        <?php $collapse = 1 ?>
                        <?php $checkbox = 0 ?>
                        @foreach($previlege as $key => $value)
                        <div class="card">
                            <div class="card-header" id="headingOne6">
                                <div class="card-title" data-toggle="collapse" data-target="#collapse_{{ $collapse }}" aria-expanded="true" aria-controls="collapse_{{ $collapse }}">
                                    <i class="flaticon-pie-chart-1"></i> {{$key}}
                                </div>
                            </div>
                            <div id="collapse_{{ $collapse }}" class="collapse show" aria-labelledby="headingOne6" data-parent="#accordionExample6">
                                <div class="card-body">
                                <?php $count = 0 ?>
                                @foreach($value as $k => $v )
                                    @if($count % 3 == 0)
                                        <div class="row">
                                    @endif
                                        <div class="col-md-4">
                                            <div class="col-md-12"><label>{{$k}}</label></div>
                                            <div class="col-md-12">
                                                <div class="checkbox-list">
                                                    @foreach($v as $action => $data)
                                                    @if($data['exists'])
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="{{$data['uri']}}" checked name="rule[]"/>
                                                        <span></span>
                                                        {{$action}}
                                                    </label>
                                                    @else
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="{{$data['uri']}}" name="rule[]"/>
                                                        <span></span>
                                                        {{$action}}
                                                    </label>
                                                    @endif
                                                    <?php $checkbox++; ?>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <?php $count++; ?>
                                    @if($count % 3 == 0 || count($value) == $count)
                                        </div>
                                    @endif
                                @endforeach
                                </div>
                            </div>
                        </div>
                        <?php $collapse++; ?>
                        @endforeach
                    </div>

                    <!--end::Accordion-->
                </div>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>
@stop

@section('quick.nav')
@stop



