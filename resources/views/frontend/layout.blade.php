<?php
	$fbAppId		= $config['fb_appid'];
	$ogTitle		= (isset($og_tags) && isset($og_tags['title']))? $og_tags['title']: $config['fb_title'];
	$ogDescription	= (isset($og_tags) && isset($og_tags['description']))? $og_tags['description']: $config['fb_description'];
	$ogImage		= (isset($og_tags) && isset($og_tags['image']))? $og_tags['image']: config('app.url') . '/app/fbimage/' . $config['fb_image'] . '.png';
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="{{$config['lang']['locale']}}" class="ie8" ng-app="app"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{$config['lang']['locale']}}" ng-app="app">
<!--<![endif]-->
<head>
<meta charset="utf-8" />
<title>{{isset($title)? $title: $config['home_title']}}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="description" content="{{isset($meta_description)? $meta_description: $config['description']}}" />
@if(isset($meta_keywords))
<meta name="keywords" content="{{$meta_keywords}}" />
@else
<meta name="keywords" content="{{implode(',', $config['keywords'])}}" />
@endif
<meta name="robots" content="noodp" />
<meta property="fb:app_id" content="{{$fbAppId}}" />
<meta property="og:locale" content="{{$config['lang']['locale']}}" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="{{$config['name']}}" />
<meta property="og:url" content="{{$config['fullUrl']}}" />
<meta property="og:title" content="{{$ogTitle}}" />
<meta property="og:description" content="{{$ogDescription}}" />
@if(isset($og_tags) && isset($og_tags['images']))
@foreach($og_tags['images'] as $ogimg)
<meta property="og:image" content="{{$ogimg}}" />
@endforeach
@else
<meta property="og:image" content="{{$ogImage}}" />
@endif
<link href="{{ $config['url'] }}/favicon.ico" rel="icon" type="image/x-icon" />
<link href="{{ $config['url'] }}/favicon.png" rel="icon" type="image/png" />
<link href="{{ $config['url'] }}/favicon.gif" rel="icon" type="image/gif" />
<link href="{{ $config['url'] }}/favicon.ico" rel="shortcut icon" />
<link href="{{ $config['url'] }}/static/images/preload-622-415.jpg" rel="prefetch" />
<link href="{{ $config['url'] }}/static/images/preload-512-288.jpg" rel="prefetch" />
<link href="{{ $config['url'] }}/static/images/preload-600-600.jpg" rel="prefetch" />
<link href="{{ $config['url'] }}/static/frontend/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="{{ $config['url'] }}/static/frontend/plugins/animate.css" rel="stylesheet" type="text/css" />
<link href="{{ $config['url'] }}/static/frontend/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="{{ $config['url'] }}/static/frontend/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css" />
<link href="{{ $config['url'] }}/static/frontend/css/ui.css" rel="stylesheet" type="text/css" />
<script src="{{ $config['url'] }}/static/frontend/bower_components/angular/angular.min.js"></script>
<script src="{{ $config['url'] }}/static/frontend/bower_components/jquery/dist/jquery.min.js"></script>
<script src="{{ $config['url'] }}/static/frontend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{ $config['url'] }}/static/frontend/bower_components/iCheck/icheck.min.js"></script>
<script src="{{ $config['url'] }}/static/frontend/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">


<!--[if lt IE 9]>
<script src="{{ $config['url'] }}/static/crossbrowserjs/html5shiv.min.js"></script>
<script src="{{ $config['url'] }}/static/crossbrowserjs/respond.min.js"></script>
<script src="{{ $config['url'] }}/static/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->
@if(isset($jsonld))
<script type="application/ld+json">{!! json_encode($jsonld) !!}</script>
@endif
<noscript>
<style type="text/css">body{background-color:#000000 !important;overflow:hidden !important;max-width:100vw;max-height:100vh};#page-container{display:none !important;}</style>
<div class="ui-noscript">{{trans('_.JS_DISABLED')}} <a href="http://enable-javascript.com/{{$config['lang']['code']}}/" target="_blank">http://enable-javascript.com/{{$config['lang']['code']}}/</a></div>
</noscript>
@section('head')
@show
</head>
<body ng-controller="root">
<!-- begin #page-container -->
<div id="page-container" class="fade">
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-transparent navbar-fixed-top navbar-small" data-state-change="disabled">

        <div class="container ui-top " id="ui-top">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ui-lang-flag">

                        <div class="lang">
                            @foreach($config['langs'] as $lang)
                                
                                    <a href="#" ng-click="lang($event,'{{$lang['code']}}')">
                                        <img src="{{ $config['url'] }}/static/frontend/images/flags/{{$lang['code']}}.png" alt="{{$lang['title']}}">
                                    </a>  
                             @endforeach
                        </div>
                       
                    </div>


                    <div class="ui-social  hidden-xs">
                        @if(trim($config['facebook']) != '')
                        <a href="{{$config['facebook']}}" target="_blank"><i class="fab fa-facebook" style="color:#5CB3FF;"></i></a>
                        @endif
                        <!-- @if(trim($config['instagram']) != '')
                        <a href="{{$config['instagram']}}" target="_blank"><i class="fab fa-instagram"style="color:#FFFFFF;"></i></a>
                        @endif
                        @if(trim($config['googleplus']) != '')
                        <a href="{{$config['googleplus']}}" target="_blank"><i class="fab fa-google-plus"style="color:#0000A0;"></i></a>
                        @endif
                        @if(trim($config['pinterest']) != '')
                        <a href="{{$config['pinterest']}}" target="_blank"><i class="fab fa-pinterest"style="color:#0000A0;"></i></a>
                        @endif
                        @if(trim($config['youtube']) != '')
                        <a href="{{$config['youtube']}}" target="_blank"><i class="fab fa-youtube-square"style="color:#FF0000;"></i></a>
                        @endif -->
                        @if(trim($config['viber']) != '')
                        <a onclick="myFunctionSwalViber('{{$config['viber']}}')" target="_blank"><i class="fab fa-viber"style="color:#F433FF;"></i></a>
                        @endif
                        @if(trim($config['whatapp']) != '')
                        <a onclick="myFunctionSwalWhatapp('{{$config['whatapp']}}')" target="_blank"><i class="fab fa-whatsapp"style="color:#4CC552;"></i></a>
                        @endif
                        @if(trim($config['line']) != '')
                        <a onclick="myFunctionSwalLine('{{$config['line']}}')" target="_blank"><i class="fab fa-line"style="color:#4CC552;"></i></a>
                        @endif
                        @if(trim($config['wechat']) != '')
                        <a onclick="myFunctionSwalWechat('{{$config['wechat']}}')" target="_blank"><i class="fab fa-weixin"style="color:#4CC552;"></i></a>
                        @endif

                    </div>
                    <div class="ui-top-info ui-email hidden-xs">
                        <a href="mailto:{{$top_email}}">{{$top_email}}</a>
                    </div>
                    <div class="ui-top-info ui-phone  hidden-xs">
                        <a href="tel:{{$top_phone}}">{{$top_phone}}</a>
                    </div>

                    <div class="ui-top-info ui-phone  hidden-lg">
                        <a href="tel:{{$top_phone}}">Tel: {{$top_phone}}</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- begin container -->
        <div class="container">
            <!-- begin navbar-header -->
            <div class="navbar-header">
                
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ $config['url'] }}/home" rel="me" alt="{!! trans('_.Home') !!}" class="navbar-brand">
                    <img src="{{ $config['url'] }}/static/images/logo-200-101.png" class="ui-logo-image">
                </a>

    

                
            </div>
            <!-- end navbar-header -->
          
            
            
            <!-- begin navbar-collapse -->
            <div class="collapse navbar-collapse" style="display: none !important;" id="header-navbar" ng-class="{'navbar-xs':screen == 'xs'}">
                <ul class="nav navbar-nav navbar-right" @if($config['lang']['code'] == 'en') ng-class="{'en-sm':screen == 'sm'}" @endif>
                   
                    <li class="dropdown @if(isset($menu) && $menu == 'company') active @endif" ng-class="{'notouch':!navmenuTouch}">
                        <a href="#" data-toggle="dropdown" ng-show="navmenuTouch">{{trans('_.Company')}} <i class="fa fa-caret-down ui-caret" aria-hidden="true"></i></a>
                        <a href="#" ng-click="$event.preventDefault()" ng-hide="navmenuTouch">{{trans('_.Company')}} <i class="fa fa-caret-down ui-caret" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu dropdown-menu-left animated fadeInDown">
                            <li @if(isset($menu) && $menu == 'company' && isset($submenu) && $submenu == 'ourstory') class="active" @endif><a href="{{ $config['url'] }}/our-story.html" rel="me" alt="{!! trans('_.Our story') !!}">{{trans('_.Our story')}}</a></li>
                            <li @if(isset($menu) && $menu == 'company' && isset($submenu) && $submenu == 'pearlcrowns') class="active" @endif><a href="{{ $config['url'] }}/pearl-crowns.html" rel="me" alt="{!! trans('_.Pearl Crowns') !!}">{{trans('_.Pearl Crowns')}}</a></li>
                            <li @if(isset($menu) && $menu == 'company' && isset($submenu) && $submenu == 'awardscertificates') class="active" @endif><a href="{{ $config['url'] }}/awards-certificates.html" rel="me" alt="{!! trans('_.Awards & Certificates') !!}">{!! trans('_.Awards & Certificates') !!}</a></li>
                            <li @if(isset($menu) && $menu == 'company' && isset($submenu) && $submenu == 'gallery') class="active" @endif><a href="{{ $config['url'] }}/gallery.html" rel="me" alt="{!! trans('_.Gallery') !!}">{{trans('_.Gallery')}}</a></li>
                        </ul>
                    </li>
                    <li class="dropdown @if(isset($menu) && $menu == 'ourpearlfarm') active @endif" ng-class="{'notouch':!navmenuTouch}">
                        <a href="#" data-toggle="dropdown" ng-show="navmenuTouch">{{trans('_.Pearl Farm')}} <i class="fa fa-caret-down ui-caret" aria-hidden="true"></i></a>
                        <a href="#" ng-click="$event.preventDefault()" ng-hide="navmenuTouch">{{trans('_.Pearl Farm')}} <i class="fa fa-caret-down ui-caret" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu dropdown-menu-left animated fadeInDown">
                            <li @if(isset($menu) && $menu == 'ourpearlfarm' && isset($submenu) && $submenu == 'pearlfarm') class="active" @endif><a href="{{ $config['url'] }}/pearl-farm.html" rel="me" alt="{!! trans('_.Phuket Pearl’s pearl farm') !!}">{!! trans('_.Phuket Pearl’s pearl farm') !!}</a></li>
                            <li @if(isset($menu) && $menu == 'ourpearlfarm' && isset($submenu) && $submenu == 'pearlfarming') class="active" @endif><a href="{{ $config['url'] }}/pearl-farming.html" rel="me" alt="{!! trans('_.Pearl farming') !!}">{{trans('_.Pearl farming')}}</a></li>
                            <li @if(isset($menu) && $menu == 'ourpearlfarm' && isset($submenu) && $submenu == 'pearltype') class="active" @endif><a href="{{ $config['url'] }}/pearl-type.html" rel="me" alt="{!! trans('_.Type of pearl') !!}">{{trans('_.Type of pearl')}}</a></li>
                        </ul>
                    </li>


                
                    <li class="hidden dropdown @if(isset($menu) && $menu == 'jewels') active @endif" ng-class="{'notouch':!navmenuTouch} ">
                        <a href="#" data-toggle="dropdown" ng-show="navmenuTouch">{{trans('_.Jewels')}} <i class="fa fa-caret-down ui-caret" aria-hidden="true"></i></a>
                        <a href="#" ng-click="$event.preventDefault()" ng-hide="navmenuTouch">{{trans('_.Jewels')}} <i class="fa fa-caret-down ui-caret" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu dropdown-menu-left animated fadeInDown">
                        <!-- <li @if(isset($menu) && $menu == 'jewels' && isset($submenu) && $submenu == 'pearlquality') class="active" @endif><a href="{{ $config['url'] }}/pearl-quality.html" rel="me" alt="{!! trans('_.Pearl Quality') !!}">{{trans('_.Pearl Quality')}}</a></li> -->
                        

                        @foreach($categories as $index => $item)
                        @php
                            $category = App\Category::where('url', $item->url)->first(); 
                            $items = $category->products()->leftJoin('products', 'product_maps.product_id', '=', 'products.id')->where('publish', '1')->orderBy('products.created_at', 'desc')->paginate(12);

                        @endphp
                                @foreach($items as $index => $map)
                                {{-- */ $product = App\Product::find($map->product_id); /* --}}
                                    @if($product)
                                    <li @if(isset($menu) && $menu == 'jewels' && isset($submenu) && $submenu == $item->url) class="active" @endif><a href="{{ $config['url'] }}/jewels/{{$item->url}}" rel="me" alt="{!! $item->getTitle($config['lang']['code']) !!}">{{$item->getTitle($config['lang']['code'])}}</a></li>
                                    @endif
                                @endforeach
                         @endforeach
                        </ul>
                    </li>
                   

                    <li class="pearlquality-hidden @if(isset($menu) && $menu == 'pearlquality') active @endif"> <a href="{{ $config['url'] }}/pearl-quality.html" rel="me" alt="{!! trans('_.Pearl Quality') !!}">{{trans('_.Pearl Quality')}}</a></li>
                    
                    <li class="new-hidden @if(isset($menu) && $menu == 'news' ) active @endif" ng-class="{'hidden': screen != 'lg' && browserName == 'safari'}"><a href="{{ $config['url'] }}/news.html" rel="me" alt="{!! trans('_.News') !!}">{{trans('_.News')}}</a></li>

					<li class="location-hidden @if(isset($menu) && $menu == 'working' ) active @endif" ng-class="{'hidden': screen != 'lg' && browserName == 'safari'}"><a href="{{ $config['url'] }}/location-opening-hours.html" rel="me" alt="{!! trans('_.Location &amp;<br> Opening hours') !!}">{!!trans('_.Location &amp;<br> Opening hours')!!}</a></li>

					<li class="tour-hidden @if(isset($menu) && $menu == 'tour') active @endif"> <a href="{{ $config['url'] }}/tours" rel="me" alt="{!! trans('_.Booking Tour') !!}">{{trans('_.Booking Tour')}}</a></li>
                    
                    
                </ul>
            </div>
            <!-- end navbar-collapse -->
        </div>
        <!-- end container -->
    </div>
    <!-- end #header -->

    @section('content')
    @show

    <footer class="ui-footer">
		<div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12 item">
                    <h3>{{trans('_.Join our newsletter')}}</h3>
                    <p>{{trans('_.Sign up with us to receive product news, events and offers interesting and special.')}}</p>
                    <form name="subscribeForm" ng-controller="subscribe" ng-submit="request($event)" id="ui-subscribe">
                        <div class="input-group ui-subscribe" ng-class="{'has-error':error, 'has-success':success}">
                            <input type="text" class="form-control" ng-model="email" ng-disabled="requesting" placeholder="{{trans('_.Your email address')}}" autocomplete="off" data-sending="{{trans('_.Saving data...')}}" data-success="{{trans('_.We save your information successfully.')}}" data-success-message="{{trans('subscribe.We will send you special offers and promotions to the email address for you to receive new information about our products.')}}">
                            <span class="input-group-addon" ng-class="{'disabled': requesting}" ng-click="request($event)" style="cursor:pointer;"><i class="fa fa-paper-plane" aria-hidden="true"></i></span>
                            <button type="submit" class="hidden"></button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 item">
                    <h3>{{trans('_.Contact Us')}}</h3>
					<?php
						$addr = isset($config['addresses']->{$config['lang']['code']})? $config['addresses']->{$config['lang']['code']}: '';
					?>
					<p>{!! nl2br($addr) !!}</p>
                    <p><span class="ico ico-em"></span><a href="mailto:{{$top_email}}" class="link" rel="me" alt="{!! $top_email !!}">{{$top_email}}</a></p>
                    <p><span class="ico ico-ph"></span>{{$top_phone}}</p>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 item">
                    <h3>{{trans('_.Latest News')}}</h3>
                    <ul class="news">
                        @foreach(App\News::where('publish', '1')->take(2)->orderBy('created_at', 'desc')->get() as $foot_news)
						<?php $newsTopic = $foot_news->getTopic($config['lang']['code']) ?>
                        <li><i class="fa fa-check-circle" aria-hidden="true"></i> <a href="{{ $config['url'] }}/news/{{$foot_news->newsid}}" alt="{{$newsTopic}}">{{$newsTopic}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12 item">
                    <h3><br></h3>
                    <ul class="social">
                        @if(trim($config['facebook']) != '')
                        <li><a href="{{$config['facebook']}}" rel="me" alt="{{$config['facebook']}}" target="_blank"><i class="fab fa-facebook"></i> Facebook</a></li>
                        @endif
                        @if(trim($config['instagram']) != '')
                        <li><a href="{{$config['instagram']}}" rel="me" alt="{{$config['instagram']}}" target="_blank"><i class="fab fa-instagram"></i> Instagram</a></li>
                        @endif
                        @if(trim($config['googleplus']) != '')
                        <li><a href="{{$config['googleplus']}}" rel="me" alt="{{$config['googleplus']}}" target="_blank"><i class="fab fa-google-plus"></i> Google+</a></li>
                        @endif
                        @if(trim($config['pinterest']) != '')
                        <li><a href="{{$config['pinterest']}}" rel="me" alt="{{$config['pinterest']}}" target="_blank"><i class="fab fa-pinterest"></i> Pinterest</a></li>
                        @endif
                        @if(trim($config['youtube']) != '')
                        <li><a href="{{$config['youtube']}}" rel="me" alt="{{$config['youtube']}}" target="_blank"><i class="fab fa-youtube"></i> Youtube</a></li>
                        @endif
                        @if(trim($config['line']) != '')
                        <li><a onclick="myFunctionSwalLine('{{$config['line']}}')" rel="me" alt="{{$config['line']}}" target="_blank"><i class="fab fa-line"></i> Line</a></li>
                        @endif
                        @if(trim($config['whatapp']) != '')
                        <li><a onclick="myFunctionSwalWhatapp('{{$config['whatapp']}}')" rel="me" alt="{{$config['whatapp']}}" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a></li>
                        @endif
                        @if(trim($config['viber']) != '')
                        <li><a onclick="myFunctionSwalViber('{{$config['viber']}}')" rel="me" alt="{{$config['viber']}}" ><i class="fab fa-viber "  ></i> Viber</a></li>
                        @endif
                        @if(trim($config['wechat']) != '')
                        <li><a onclick="myFunctionSwalWechat('{{$config['wechat']}}')" rel="me" alt="{{$config['viber']}}" ><i class="fab fa-weixin"></i> WeChat</a></li>
                        @endif
                    </ul>
                </div>
            </div>
		</div>
        <div class="container bottom">
            <div class="row">
                <div class="col-sm-5 copyright"><p>{{$config['copyright']}}</p></div>
                <div class="col-sm-7 menulist" ng-class="{'text-right':screen == 'lg' || screen == 'md' || screen == 'sm', 'right':screen == 'lg' || screen == 'md' || screen == 'sm', 'small':screen == 'xs'}">
                    <a href="{{ $config['url'] }}/pearl-care.html">{{trans('_.Pearl Care')}}</a>
                    <!-- <a href="{{ $config['url'] }}/jewels">{{trans('_.Pearl Jewels')}}</a> -->
                    <a href="{{ $config['url'] }}/pearl-farm.html">{{trans('_.Pearl Farm')}}</a>
                    <a href="{{ $config['url'] }}/tours">{{trans('_.Booking Tour')}}</a>
                    <a href="{{ $config['url'] }}/contactus.html">{{trans('_.Contact us')}}</a>
                </div>
				<div class="col-xs-12 visible-xs">
					<div class="footer-lang">
						<ul>
							@foreach($config['langs'] as $lang)
							<li>
								<a href="#" ng-click="lang($event,'{{$lang['code']}}')">
									<img src="{{ $config['url'] }}/static/frontend/images/flags/{{$lang['code']}}.png" alt="{{$lang['title']}}"> <span>{{$lang['title']}}</span>
								</a>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
            </div>
		</div>
	</footer>
	<!-- / footer -->

</div>
<!-- end #page-container -->

<span class="visible-lg" id="screen-lg"></span>
<span class="visible-md" id="screen-md"></span>
<span class="visible-sm" id="screen-sm"></span>
<span class="visible-xs" id="screen-xs"></span>
<script>(function(a){a.TRANS={!! json_encode([
    'ERROR' => [
        'GENERAL' => trans('error.general')
    ]
]) !!}})(window);</script>
<script src="{{ $config['url'] }}/static/js/platform.js"></script>
<script src="{{ $config['url'] }}/static/frontend/js/app.js?t=1"></script>
<script src="{{ $config['url'] }}/static/frontend/js/common-v2.js"></script>
@section('foot')
@show
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-97464406-1', 'auto');
  ga('send', 'pageview');
</script>



<script>
function myFunctionSwalLine(param) {

    swal({
        title: "LineID",
        text: param,
        icon: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPoAAAD6AQAAAACgl2eQAAACJElEQVR42u2ZQY6DMAxFjVhkyRFyk3IxJJC4GNwkR2CZRYXnf5PONG01i9lgaWCBCLxFY33/2K7o79ciF3ABF/CvAcEVc6N3kUZnlWYb+Gp0BQTVe1Tdhphvgm89nrB0BiwyxLDqhG/YBamIrXgEyq1V8QvoLm3SdWtT7hF5fwD1kKnTsEOqUO79g2BOBiyzwroNP7cPqXcyUC7+bOghIfLjRxM7F9iR9HgeqYeiV1iWM2BVTeahapkFIMGoRldA0E2i3LopmgrgUVh6A0Q60wOViqAflnq8cwTAlJj59m3WsHdwg159AQg17JMqMCM1ywfqC1DGFr99ThAFldtNkiuP8gDwOvIdu6D5T7FOfwcApIDTaKFR7ZBqZo7p6gwwewoIcCwogp6rzHIA6HeZJGZPYqXds9M6AKS3rVAKlvkNfLWuQBwAViYhyq0iwHPCW7p95Q8uABMA0/9xzL+Y2PmANRQUQLIneBTatedz0wPAIx0VCFWwHgXdIHXq+QAE9vQoPjJ7Xlt6AngaqZVJ8HgzqlGrCsQDgMUkzPekRLPVSvU2zwdKycEAs/R8d3sngHAEgyhjhZ53s6UvQAtloS7tbqUHD4D1vFbGWX3MzKqnBx6AMj3oEGWjWGvC950ByzEdkjIxslpJa8E4AXgaHbXw8tYEeQEQZU02xaQ9pXrK6gGwKSubNAAtd6GavQGWWQDKLejriMMDcP3BcQEXcAF/Ab4AyRjZEsAVtFEAAAAASUVORK5CYII=",
        }).then(function() {
        // Redirect the user
        //window.location.href = url;
        
     });
}
</script>

<script>
function myFunctionSwalWhatapp(param) {

        var span = document.createElement("span");
        span.innerHTML=param,

        swal({
        title: "WhatsApp",
        content: span,
         }).then(function() {
        // Redirect the user
        //window.location.href = url;
        
     });
}
</script>

<script>
function myFunctionSwalViber(param) {
    var span = document.createElement("span");
        span.innerHTML=param,

    swal({
        title: "Viber",
        content: span,
        }).then(function() {
        // Redirect the user
        //window.location.href = url;
        

     });
}
</script>

<script>
function myFunctionSwalWechat(param) {
    var span = document.createElement("span");
        span.innerHTML=param,

    swal({
        title: "WeChat",
        content: span,
        }).then(function() {
        // Redirect the user
        //window.location.href = url;
        

     });
}
</script>




</body></html>
