<div class="row">
    <div class="col-lg-12">
        <div class="row">
            @foreach($bottom as $bottom_value)
                <div class="col-lg-4">
                    <div class="ibox float-e-margins" style="border-top:solid 4px #e7eaec">
                        <div class="ibox-title ibox-title-dashboard">
                            @if ($bottom_value['url'] != '')
                                <a href="{{$bottom_value['url']}}" class="dashboard-a" target="_blank">{{$bottom_value['title']}} <span>(more ...)</span></a>
                            @else
                                <a href="{{$bottom_value['url']}}" style="pointer-events: none;" class="dashboard-a" target="_blank">{{$bottom_value['title']}}</a>
                            @endif
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content ibox-content-dashboard">
                            <table class="table table-hover no-margins">
                                <thead>
                                <tr>
                                    @foreach($bottom_value['column_title'] as $title)
                                        <th>{{$title}}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bottom_value['column_data'] as $data)
                                    <tr onclick="window.open('{{ $data['url'] }}', '_blank');" style="cursor:pointer">
                                        @foreach($data['data'] as $value)
                                            <td title="{{$value}}" class="dashboard-bottom-table-td">{{$value}}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
