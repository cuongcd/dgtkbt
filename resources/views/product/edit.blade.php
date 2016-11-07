    @extends ('product.layout')

@section('content')

    <div class="wrapper wrapper-content fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <form id="product_edit" action="{{ route('works.save', []) }}"
                      method="post" class="form-horizontal" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <input type="hidden" name="tab" value=""/>
                    <div class="tab-content tab-product">
                        <div id="product_info" class="tab-pane fade in active">
                            @include('product.template_review')
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="ajax-loading-mask" class="loading-mask" style="display: none;">
        <div id="ajax-loading" class="loading" style="display: block;">
            <img src="{{URL::to('images/loading.gif')}}" alt="{{ Lang::get('catalog.loading') }}"/>

            <p>{{ Lang::get('catalog.please_wait') }}</p>
        </div>
    </div>

    {{--<script type="text/javascript">--}}
        {{--<!----}}
        {{--var product = new Product('#product_edit', '{{ route("products.duplicate", ["id" => $product->getKey()]) }}', '{{ route("products.delete", ["id" => $product->getKey()]) }}', '{{ Lang::get("catalog.delete_product_confirm") }}');--}}
        {{--//-->--}}
    {{--</script>--}}
    {{--<script type="text/javascript">--}}
        {{--function getUrlParameter(sParam) {--}}
            {{--var sPageURL = decodeURIComponent(window.location.search.substring(1)),--}}
                    {{--sURLVariables = sPageURL.split('&'),--}}
                    {{--sParameterName,--}}
                    {{--i;--}}

            {{--for (i = 0; i < sURLVariables.length; i++) {--}}
                {{--sParameterName = sURLVariables[i].split('=');--}}

                {{--if (sParameterName[0] === sParam) {--}}
                    {{--return sParameterName[1] === undefined ? true : sParameterName[1];--}}
                {{--}--}}
            {{--}--}}
        {{--}--}}
        {{--$(document).ready(function(){--}}
            {{--var tab = getUrlParameter('tab');--}}
                {{--var url = window.location.pathname.split('/');--}}
                {{--var id = url[3];--}}
                {{--$.ajax({--}}
                    {{--url: "/products/" + id + "/filter?ajax=1",--}}
                    {{--beforeSend: function () {--}}
                        {{--$('#ajax-loading-mask').show();--}}
                        {{--$('#ajax-loading').show();--}}
                    {{--},--}}
                    {{--success: function(result){--}}
                        {{--$('#ajax-loading-mask').hide();--}}
                        {{--$('#ajax-loading').hide();--}}
                        {{--$("#related_product").html(result);--}}
                    {{--}});--}}
            {{--if(tab != '' || tab != null){--}}
                {{--$('.nav-tabs a[href="#'+tab+'"]').tab('show');--}}
            {{--}--}}
        {{--});--}}
        {{--$("#product_edit").on('submit', function () {--}}
            {{--var url = window.location.pathname.split('/');--}}
            {{--var id = url[3];--}}
            {{--var grid_related_id = "related_products_" + id + "-grid-content";--}}
            {{--$("#"+grid_related_id).find("thead input").each(function(){--}}
                {{--$(this).prop('disabled', true);--}}
            {{--});--}}
            {{--$("#"+grid_related_id).find("thead select").each(function(){--}}
                {{--$(this).prop('disabled', true);--}}
            {{--});--}}
            {{--$('#product_review').find('input').each(function () {--}}
                {{--$(this).prop('disabled', true);--}}
            {{--});--}}

            {{--var tab = $('.nav-tabs > li.active > a').attr('href');--}}
            {{--$('input[type="hidden"][name="tab"]').val(tab.slice(1,tab.length));--}}

            {{--var isValid = true;--}}
            {{--if (this.hasChildNodes('.nav.nav-tabs')) {--}}
                {{--var validator = $(this).validate();--}}
                {{--$(this).find("select").each(function () {--}}
                    {{--if (!validator.element(this)) {--}}
                        {{--isValid = false;--}}
                        {{--$('a[href=#' + $(this).closest('.tab-pane:not(.active)').attr('id') + ']').tab('show');--}}
                        {{--return false;--}}
                    {{--}--}}
                {{--});--}}
                {{--if (isValid) {--}}
                    {{--$(this).find("input").each(function () {--}}
                        {{--if (!validator.element(this)) {--}}
                            {{--isValid = false;--}}
                            {{--$('a[href=#' + $(this).closest('.tab-pane:not(.active)').attr('id') + ']').tab('show');--}}
                            {{--return false;--}}
                        {{--}--}}
                    {{--});--}}
                {{--}--}}
            {{--}--}}
            {{--if (!isValid) {--}}
                {{--return false;--}}
            {{--}--}}
        {{--});--}}
    {{--</script>--}}

@stop
