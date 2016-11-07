{{--top--}}
<div class="row">
    @foreach(\App\Helpers\User::GetAllThongBao() as $notify)
            <div class="col-lg-12 ibox white-bg" style="border-top:solid 4px #e7eaec">
                <div class="ibox">
                    <div class="ibox-title ibox-title-dashboard">
                        <span class="label label-success pull-right label-button-dashboard">{{$notify->created_at}}</span>
                        <h5>{{$notify->name}}</h5>
                    </div>
                    <div class="ibox-content ibox-content-dashboard" style="height: 60px;">
                        <small class="ibox-content-dashboard-small">
                            <h4>{{$notify->description}}</h4>
                        </small>
                    </div>
                </div>
            </div>
     @endforeach

</div>
