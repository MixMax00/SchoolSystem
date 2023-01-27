<!-- Modernize js -->
<script src="{{asset('assets/backend')}}/js/modernizr-3.6.0.min.js"></script>
<!-- jquery-->
<script src="{{asset('assets/backend')}}/js/jquery-3.3.1.min.js"></script>
<!-- Plugins js -->
<script src="{{asset('assets/backend')}}/js/plugins.js"></script>
<!-- Popper js -->
<script src="{{asset('assets/backend')}}/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="{{asset('assets/backend')}}/js/bootstrap.min.js"></script>
<!-- Select 2 Js -->
<script src="{{asset('assets/backend')}}/js/select2.min.js"></script>
<!-- Counterup Js -->
<script src="{{asset('assets/backend')}}/js/jquery.counterup.min.js"></script>
<!-- Moment Js -->
<script src="{{asset('assets/backend')}}/js/moment.min.js"></script>
<!-- Waypoints Js -->
<script src="{{asset('assets/backend')}}/js/jquery.waypoints.min.js"></script>
<!-- Scroll Up Js -->
<script src="{{asset('assets/backend')}}/js/jquery.scrollUp.min.js"></script>
<!-- Full Calender Js -->
<script src="{{asset('assets/backend')}}/js/fullcalendar.min.js"></script>
<!-- Chart Js -->

<script src="{{ asset('assets/backend/js/jquery.dataTables.min.js') }}"></script>
{{-- <script src="{{asset('assets/backend')}}/js/Chart.min.js"></script>
<script src="{{ asset('assets/backend/Datatable/datatables.min.js') }}"></script>
<script src="{{ asset('assets/backend/Datatable/Buttons-2.3.3/js/buttons.bootstrap5.min.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/backend/js/pdfmake.min.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
{{--<script src="https://cdn.ckeditor.com/[version.number]/[distribution]/ckeditor.js"></script>--}}
{{--<script>--}}
{{--    ClassicEditor--}}
{{--        .create( document.querySelector( '#editor' ) )--}}
{{--        .then( editor => {--}}
{{--            console.log( editor );--}}
{{--        } )--}}
{{--        .catch( error => {--}}
{{--            console.error( error );--}}
{{--        } );--}}
{{--</script>--}}
<script>
    CKEDITOR.replace( 'editor' );
</script>

{{--<script>--}}
{{--    CKEDITOR.replace( 'editor1' );--}}
{{--</script>--}}



<!-- Custom Js -->
<script src="{{asset('assets/backend')}}/js/main.js"></script>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

@yield('js')
