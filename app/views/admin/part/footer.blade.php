@section('footer')
<div class="copyright">
</div>
{{ HTML::script('assets/js/main.min.js?v='.$version); }}
@include('admin.part.validation')
@yield('javascript')
@stop