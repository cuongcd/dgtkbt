    @extends ('staff.layout')

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
                            @include('staff.template_review')
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

@stop
