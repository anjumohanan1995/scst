@extends('layouts.app')
@section('content')

<style type="text/css">
  .nav-tabs-custom > .nav-tabs > li:first-of-type.active > a {
    border-left-color: transparent;
}
.nav-tabs-custom > .nav-tabs > li.active > a, .nav-tabs-custom > .nav-tabs > li.active:hover > a {
    background-color: #fff;
    color: #444;
}
.nav-tabs-custom > .nav-tabs > li.active > a {
    border-top-color: transparent;
    border-left-color: #f4f4f4;
    border-right-color: #f4f4f4;
}
.nav-tabs-custom > .nav-tabs > li > a:hover {
    color: #999;
}
.nav-tabs-custom > .nav-tabs > li > a, .nav-tabs-custom > .nav-tabs > li > a:hover {
    background: transparent;
        background-color: transparent;
    margin: 0;
}
.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
    color: #555;
    cursor: default;
    background-color: #fff;
    border: 1px solid #ddd;
        border-top-color: rgb(221, 221, 221);
        border-right-color: rgb(221, 221, 221);
        border-bottom-color: rgb(221, 221, 221);
        border-left-color: rgb(221, 221, 221);
    border-bottom-color: transparent;
}
.nav-tabs-custom > .nav-tabs > li > a {
    color: #444;
    border-radius: 0;
}
.nav > li > a:hover, .nav > li > a:active, .nav > li > a:focus {
    color: #444;
    background: #f7f7f7;
}
.nav-tabs > li > a:hover {
    border-color: #eee #eee #ddd;
}
.nav > li > a:focus, .nav > li > a:hover {
    text-decoration: none;
    background-color: #eee;
}
.nav-tabs > li > a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
}
.nav > li > a {
    position: relative;
    display: block;
    padding: 10px 15px;
}
a:active, a:hover {
    outline: 0;
}

.nav-tabs-custom > .nav-tabs > li.active > a, .nav-tabs-custom > .nav-tabs > li.active:hover > a {
    background-color: #fff;
    color: #444;
}

.tg-list-item {
    margin: 0 2em;
}
html, ul, li {
    list-style: none;
    margin: 0;
    padding: 0;
}
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

input[type="checkbox"], input[type="radio"] {
    margin-bottom: 15px;
}
input[type="checkbox"], input[type="radio"] {
    box-sizing: border-box;
    padding: 0;
}
input[type="checkbox"], input[type="radio"] {
    margin: 4px 0 0;
    margin-top: 1px\9;
    line-height: normal;
}
input[type="checkbox"], input[type="radio"] {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0;
}
.tgl, .tgl::after, .tgl::before, .tgl *, .tgl ::after, .tgl ::before, .tgl + .tgl-btn {
    box-sizing: border-box;
}
.tgl {
    display: none;
}


.logo-box{
    background-color: white;
}


.tgl-skewed:checked + .tgl-btn {
    background-color: #86d993 !important;
}
.tgl-skewed:checked + .tgl-btn {
    background: #86d993;
        background-color: rgb(134, 217, 147);
}
.tgl-skewed + .tgl-btn {
    background-color: #f9616d !important;
}
.tgl-skewed + .tgl-btn {
    margin-bottom: 5px;
}
.tgl-skewed + .tgl-btn {
    width: 73px;
}
.tgl-skewed + .tgl-btn {
    overflow: hidden;
    -webkit-transform: skew(-10deg);
    transform: skew(-10deg);
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    transition: all .2s ease;
    font-family: sans-serif;
    background: red;
}
.tgl + .tgl-btn {
    outline: 0;
    display: block;
    width: 4em;
    height: 2em;
    position: relative;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.tgl, .tgl::after, .tgl::before, .tgl *, .tgl ::after, .tgl ::before, .tgl + .tgl-btn {
    box-sizing: border-box;
}



.tgl-skewed + .tgl-btn::before {

    left: 0;
    content: attr(data-tg-off);

}
.tgl-skewed + .tgl-btn::after, .tgl-skewed + .tgl-btn::before {

    -webkit-transform: skew(10deg);
    transform: skew(10deg);
    display: inline-block;
    transition: all .2s ease;
    width: 100%;
    text-align: center;
    position: absolute;
    line-height: 2em;
    font-weight: bold;
    color: #fff;
    text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);

}
.tgl + .tgl-btn::before {

    display: none;

}
.tgl + .tgl-btn::after, .tgl + .tgl-btn::before {

    position: relative;
    display: block;
    content: "";
    width: 50%;
    height: 100%;

}
::after, ::before {

    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;

}
.tgl-skewed + .tgl-btn {

    font-family: sans-serif;

}
.tgl + .tgl-btn {

    cursor: pointer;

}
label {

    font-weight: 700;

}
html, ul, li {

    list-style: none;

}
.inputfile-1 + label {
    color: #FFF;
    background-color: #f9616d !important;
}
.inputfile-1 + label {
    color: #f1e5e6;
    background-color: #d3394c;
}
.inputfile + label {
    max-width: 80%;
    font-size: 1.25rem;
    font-weight: 700;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    padding: 0.625rem 1.25rem;
}
label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
}
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
body {
    font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
    font-weight: 400;
}
body {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.42857143;
    color: #333;
}

.inputfile + label * {
    pointer-events: none;
}
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.inputfile-1 + label {
    color: #FFF;
}
.inputfile-1 + label {
    color: #f1e5e6;
}
.inputfile + label {
    font-size: 1.25rem;
    font-weight: 700;
    white-space: nowrap;
    cursor: pointer;
}

.well {
    min-height: 20px;
    padding: 19px;
    margin-bottom: 20px;
    background-color: #f5f5f5;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
}



.tgl {
  display: none;
}
.tgl, .tgl:after, .tgl:before, .tgl *, .tgl *:after, .tgl *:before, .tgl + .tgl-btn {
  box-sizing: border-box;
}
.tgl::-moz-selection, .tgl:after::-moz-selection, .tgl:before::-moz-selection, .tgl *::-moz-selection, .tgl *:after::-moz-selection, .tgl *:before::-moz-selection, .tgl + .tgl-btn::-moz-selection {
  background: none;
}
.tgl::selection, .tgl:after::selection, .tgl:before::selection, .tgl *::selection, .tgl *:after::selection, .tgl *:before::selection, .tgl + .tgl-btn::selection {
  background: none;
}
.tgl + .tgl-btn {
  outline: 0;
  display: block;
  width: 4em;
  height: 2em;
  position: relative;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.tgl + .tgl-btn:after, .tgl + .tgl-btn:before {
  position: relative;
  display: block;
  content: "";
  width: 50%;
  height: 100%;
}
.tgl + .tgl-btn:after {
  left: 0;
}
.tgl + .tgl-btn:before {
  display: none;
}
.tgl:checked + .tgl-btn:after {
  left: 50%;
}

.tgl-light + .tgl-btn {
  background: #f0f0f0;
  border-radius: 2em;
  padding: 2px;
  transition: all .4s ease;
}
.tgl-light + .tgl-btn:after {
  border-radius: 50%;
  background: #fff;
  transition: all .2s ease;
}
.tgl-light:checked + .tgl-btn {
  background: #9FD6AE;
}

.tgl-ios + .tgl-btn {
  background: #fbfbfb;
  border-radius: 2em;
  padding: 2px;
  transition: all .4s ease;
  border: 1px solid #e8eae9;
}
.tgl-ios + .tgl-btn:after {
  border-radius: 2em;
  background: #fbfbfb;
  transition: left 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), padding 0.3s ease, margin 0.3s ease;
  box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1), 0 4px 0 rgba(0, 0, 0, 0.08);
}
.tgl-ios + .tgl-btn:hover:after {
  will-change: padding;
}
.tgl-ios + .tgl-btn:active {
  box-shadow: inset 0 0 0 2em #e8eae9;
}
.tgl-ios + .tgl-btn:active:after {
  padding-right: .8em;
}
.tgl-ios:checked + .tgl-btn {
  background: #86d993;
}
.tgl-ios:checked + .tgl-btn:active {
  box-shadow: none;
}
.tgl-ios:checked + .tgl-btn:active:after {
  margin-left: -.8em;
}

.tgl-skewed + .tgl-btn {
  overflow: hidden;
  -webkit-transform: skew(-10deg);
          transform: skew(-10deg);
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  transition: all .2s ease;
  font-family: sans-serif;
  background: red;
}
.tgl-skewed + .tgl-btn:after, .tgl-skewed + .tgl-btn:before {
  -webkit-transform: skew(10deg);
          transform: skew(10deg);
  display: inline-block;
  transition: all .2s ease;
  width: 100%;
  text-align: center;
  position: absolute;
  line-height: 2em;
  font-weight: bold;
  color: #fff;
  text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
}
.tgl-skewed + .tgl-btn:after {
  left: 100%;
  content: attr(data-tg-on);
}
.tgl-skewed + .tgl-btn:before {
  left: 0;
  content: attr(data-tg-off);
}
.tgl-skewed + .tgl-btn:active {
  background: #888;
}
.tgl-skewed + .tgl-btn:active:before {
  left: -10%;
}
.tgl-skewed:checked + .tgl-btn {
  background: #86d993;
}
.tgl-skewed:checked + .tgl-btn:before {
  left: -100%;
}
.tgl-skewed:checked + .tgl-btn:after {
  left: 0;
}
.tgl-skewed:checked + .tgl-btn:active:after {
  left: 10%;
}

.tgl-flat + .tgl-btn {
  padding: 2px;
  transition: all .2s ease;
  background: #fff;
  border: 4px solid #f2f2f2;
  border-radius: 2em;
}
.tgl-flat + .tgl-btn:after {
  transition: all .2s ease;
  background: #f2f2f2;
  content: "";
  border-radius: 1em;
}
.tgl-flat:checked + .tgl-btn {
  border: 4px solid #7FC6A6;
}
.tgl-flat:checked + .tgl-btn:after {
  left: 50%;
  background: #7FC6A6;
}

.tgl-flip + .tgl-btn {
  padding: 2px;
  transition: all .2s ease;
  font-family: sans-serif;
  -webkit-perspective: 100px;
          perspective: 100px;
}
.tgl-flip + .tgl-btn:after, .tgl-flip + .tgl-btn:before {
  display: inline-block;
  transition: all .4s ease;
  width: 100%;
  text-align: center;
  position: absolute;
  line-height: 2em;
  font-weight: bold;
  color: #fff;
  position: absolute;
  top: 0;
  left: 0;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  border-radius: 4px;
}
.tgl-flip + .tgl-btn:after {
  content: attr(data-tg-on);
  background: #02C66F;
  -webkit-transform: rotateY(-180deg);
          transform: rotateY(-180deg);
}
.tgl-flip + .tgl-btn:before {
  background: #FF3A19;
  content: attr(data-tg-off);
}
.tgl-flip + .tgl-btn:active:before {
  -webkit-transform: rotateY(-20deg);
          transform: rotateY(-20deg);
}
.tgl-flip:checked + .tgl-btn:before {
  -webkit-transform: rotateY(180deg);
          transform: rotateY(180deg);
}
.tgl-flip:checked + .tgl-btn:after {
  -webkit-transform: rotateY(0);
          transform: rotateY(0);
  left: 0;
  background: #7FC6A6;
}
.tgl-flip:checked + .tgl-btn:active:after {
  -webkit-transform: rotateY(20deg);
          transform: rotateY(20deg);
}

 



 .iconpicker-popover.popover .popover-title input[type=search].iconpicker-search {
    width: -webkit-fill-available;
}
.tgl-skewed + .tgl-btn {
    width: 73px;
}
.form-control {
    margin-bottom: 5px;
}
.select2-container--default 
.select2-selection--single, 
.select2-selection .select2-selection--single {
    margin-bottom: 5px;
}
.tgl-skewed + .tgl-btn {
    margin-bottom: 5px;
}
button, input, select, textarea {
    margin-bottom: 5px;
}


.inputfile-1 + label {
    color: #f1e5e6;
    background-color: #d3394c;
}

.inputfile-1:focus + label,
.inputfile-1.has-focus + label,
.inputfile-1 + label:hover {
    background-color: #722040;
}
</style>



<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
		<div class="main-container container-fluid">
		<!-- breadcrumb -->
		    <div class="breadcrumb-header justify-content-between row me-0 ms-0" >
				<div class="col-xl-9">
					<h4 class="content-title mb-2">Settings</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> - Settings</li>
                        </ol>
                    </nav>
                    </div><div class="col-xl-3">
                </div>
			</div>
		<!-- /breadcrumb -->
		<!-- main-content-body -->
			<div class="main-content-body">
                <div class="row row-sm mt-4">
					<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">
						<div class="card" style="padding:20px;">
							  @include('settings.genral')
                        </div>
                       

                    </div>
                </div>
               


            </div>
               </div>
               


            </div>

@endsection