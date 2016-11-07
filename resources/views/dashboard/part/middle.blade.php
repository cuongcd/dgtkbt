<div class="row">
    <div class="col-lg-12">
        <div class="ibox white-bg">
            <div class="ibox-title ibox-title-dashboard" style="border-top:solid 4px #e7eaec">
                <h5 id="middle-content-title">{{ $middle['title'] }}</h5>

                <div class="pull-right">
                    <div data-toggle="buttons" class="btn-group">
                        @foreach($middle['tab'] as $tab)
                            <label class="btn btn-sm btn-info dashboard-order-chart"
                                   id="{{$tab}}-daily"> {{$tab}} </label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="ibox-content ibox-content-dashboard">
                @foreach($middle['data'] as $data)
                    <div class="row" id="{{ $data['tab'] }}-content">  <!-- Monthly Content -->
                        <div class="col-lg-9">
                            <div id="{{ $data['tab'] }}-container"
                                 style="min-width: 310px;max-width: 850px; height: 250px; margin: 0 auto"></div>
                            <script type="text/javascript">
                                var category = '{{ json_encode($data['data']['category']) }}'.replace(/&quot;/g, '').replace('[', '').replace(']', '').split(",");
                                var column_data = '{{ json_encode($data['data']['column_data']) }}'.replace(/&quot;/g, '').replace('[', '').replace(']', '').split(",").map(Number);
                                var spline_data = '{{ json_encode($data['data']['spline_data']) }}'.replace(/&quot;/g, '').replace('[', '').replace(']', '').split(",").map(Number);
                                history_charts('{{ $data['tab'] }}-container', parseInt('{{ $data['data']['step'] }}'), category, '{{ $data['data']['unit'] }}', '{{ $data['data']['column_name'] }}', column_data, '{{ $data['data']['spline_name'] }}', spline_data);
                            </script>
                        </div>
                        <div class="col-lg-3">
                            <ul class="stat-list">
                                @foreach($data['content'] as $d)
                                    <li>
                                        <h2 class="no-margins">{{ $d['count'] }}</h2>
                                        <small>{{ $d['text'] }}</small>
                                        <div class="progress progress-mini">
                                            <div style="width: 100%;" class="progress-bar"></div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>