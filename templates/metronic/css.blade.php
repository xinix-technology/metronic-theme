<!--begin::Global Theme Styles(used by all pages)-->
<link href="{{ Theme::base('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ Theme::base('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ Theme::base('assets/css/style.bundle.css') }}" rel="stylesheet">
<!--end::Global Theme Styles-->

<!--begin::Layout Themes(used by all pages)-->

<link href="{{ Theme::base('assets/css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ Theme::base('assets/css/themes/layout/header/menu/dark.css') }}" rel="stylesheet" type="text/css" />
<link href="{{Theme::base('assets/css/themes/layout/brand/') . ($app->config()['bono.theme']['dark'] ? 'dark' : 'light') . '.css'}}" rel="stylesheet" type="text/css" />
<link href="{{Theme::base('assets/css/themes/layout/aside/') . ($app->config()['bono.theme']['dark'] ? 'dark' : 'light') . '.css'}}" rel="stylesheet" type="text/css" />
<!--end::Layout Themes-->

<link href="{{ Theme::base('assets/css/metronic/component.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ Theme::base('assets/css/metronic/custom.css') }}" rel="stylesheet" type="text/css"/>