@extends('layout')
<?php
use ROH\Util\Inflector;
use App\Library\Pagination;
?>
<?php
$schema = array();
foreach (f('controller')->schema() as $key => $field) {
    if ($field['list-column']) {
        $schema[$key] = $field;
    }
}
?>
@section('pagetitle')
   {{ Inflector::pluralize(Inflector::humanize(f('controller')->getClass())) }}
@stop

@section('sub-header')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ l('{0}', Inflector::humanize(f('controller')->getClass())) }}</h5>
            <!--end::Page Title-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

            <!--begin::Search Form-->
            <div class="d-flex align-items-center" id="kt_subheader_search">
                <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{count($entries)}} Total</span>
                @section('form-search')
                <form class="ml-5" id="formsearch">
                    <div class="input-group input-group-sm input-group-solid" style="max-width: 175px">
                        <input type="text" class="form-control" placeholder="Search..." id="searchbar" />
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <span class="svg-icon">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <!--<i class="flaticon2-search-1 icon-sm"></i>-->
                            </span>
                        </div>
                    </div>
                </form>
                @show
            </div>
            <!--end::Search Form-->
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Button-->
            <a href="#" class=""></a>
            <!--end::Button-->
            <!--begin::Button-->
            <a href="{{ f('controller.url', '/null/create') }}" class="btn btn-light-primary font-weight-bold ml-2">
                <span class="svg-icon">
                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-02-01-052524/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Plus.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                Add {{ l('{0}', Inflector::humanize(f('controller')->getClass())) }}
            </a>
            <a href="{{f('controller.url','/:mutliid/trash')}}" data-title="Delete Selected Record" class="btn btn-light-danger font-weight-bold ml-2 btn-multi-delete">
                <span class="svg-icon">
                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-02-01-052524/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Check.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"/>
                            <path d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) "/>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                Delete Selected
            </a>
        </div>
        <!--end::Toolbar-->
    </div>
</div>
<!--end::Subheader-->
@stop

@section('fields')
<div class="card card-custom">
    <div class="card-body">
        @section('table.search')
        <div class="table-responsive">
            <table class="table table-hover fixed-tail" id="sample_1">
                @section('table.head')
                <thead>
                    <tr>
                        @if (count($schema))
                            <th>
                                <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                    <input type="checkbox" class="group-checkable"/>
                                    <span></span>
                                </label>
                            </th>
                            @foreach ($schema as $key => $field)
                            <th>
                                <a href="{{{ f('controller.url', '?!sort['.$key.']='.(@$_GET['!sort'][$key] == 1 ? -1 : 1)) }}}">{{ $field['label'] }} </a>
                            </th>
                            @endforeach
                            <th>&nbsp; </th>
                        @else
                            <th>Data</th>
                        @endif
                    </tr>
                </thead>
                @show
                <tbody>
                    @section('table.body')
                        @foreach ($entries as $entry)
                            <?php $i = 0 ?>
                            <tr>
                                @if (count($schema))
                                    <td>
                                        <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                            <input type="checkbox" class="checkboxes search-checkbox" value="{{$entry['$id']}}"/>
                                            <span></span>
                                        </label>
                                    </td>
                                    @foreach ($schema as $name => $field)
                                    <td>
                                        @if($i++ === 0)
                                            <a href="{{ f('controller.url', '/'.$entry['$id']) }}">
                                                <?php 
                                                    try { 
                                                        $str = $entry->format($name);
                                                        if (!(strcmp( $str, strip_tags($str) ) == 0)) {
                                                            echo $str;
                                                        } else {
                                                            $string = strip_tags($entry->format($name));
                                                            echo substr($string, 0, 48); 
                                                        }
                                                    } catch(\Exception $e) {
                                                        echo 'xxx';
                                                    }
                                                ?>
                                            </a>
                                        @else
                                            <?php 
                                                try { 
                                                    $str = $entry->format($name);
                                                    if (!(strcmp( $str, strip_tags($str) ) == 0)) {
                                                        echo $str;
                                                    } else {
                                                        $string = strip_tags($entry->format($name));
                                                        echo substr($string, 0, 48); 
                                                    }
                                                } catch(\Exception $e) {
                                                    echo 'xxx';
                                                }
                                            ?>
                                        @endif
                                    </td>
                                    @endforeach
                                    <td>
                                        <span>
                                            @if(f('auth.allowed', f('controller')->getBaseUri().'/:id/update'))
                                            <a href="{{ f('controller.url', '/'.$entry['$id'].'/update') }}" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2" title="Edit details">                            
                                                <span class="svg-icon svg-icon-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "></path>                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </a>
                                            @endif
                                            @if(f('auth.allowed', f('controller')->getBaseUri().'/:id/trash'))
                                            <a href="#theModal" data-title="Delete Record" data-remote="{{ f('controller.url', '/'.$entry['$id'].'/trash') }}" data-toggle="modal" data-target="#theModal" class="btn btn-sm btn-default btn-text-danger btn-hover-danger btn-icon mr-2" title="Delete record">                            
                                                <span class="svg-icon svg-icon-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </a>
                                            <!-- <a href="#theModal" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-title="Delete Record" data-remote="{{ f('controller.url', '/'.$entry['$id'].'/trash') }}" data-toggle="modal" data-target="#theModal">
                                                <i class="la la-trash"></i>
                                            </a> -->
                                            @endif
                                        </span>
                                    </td>
                                @else
                                <td><a href="{{ f('controller.url', '/'.$entry['$id']) }}">{{ $entry->format() }}</a></td>
                                @endif
                            </tr>
                        @endforeach
                    @show


                </tbody>
            </table>
        </div>
        @show
    </div>
    @if($entries->count(true))
        @section('pagination')
            <div class="kt-separator kt-separator--space-sm kt-separator--border-dashed"></div>
            <div class="kt-container kt-container--fluid">
                <div class="kt-content">
                    <?php
                        $pagination = new Pagination($entries);
                        echo $pagination->paginate();
                    ?>
                </div>
            </div>
        @show
    @endif
</div>
@stop
@section('customjs')
@stop
@section('customcss')
@stop
