<div class="ibox float-e-margins">
    <div class="ibox-content">
        <table id="example"
               class="table table-striped table-bordered table-hover dataTables-example dataTable dtr-inline display"
               style="text-align: center">
            <thead>
            <tr class="headings">
                <th class="sorting" data-name="name" data-dir="asc" title="Asc"
                    style="width: 40px">{{Lang::get('labels.key')}}</th>
                <th class="sorting" data-name="email" data-dir="asc" title="Asc">{{Lang::get('labels.en')}}</th>
                <th class="sorting" data-name="comment" data-dir="asc" title="Asc">{{Lang::get('labels.vi')}}</th>
                {{--<th>Action</th>--}}
            </tr>
            </thead>
            <tbody>
            @foreach($trans['en'] as $key=>$review)
                <tr title="" class="pointer">
                    <td class="name " style="text-align: left">
                        {{$key}}
                    </td>
                    <td class="email ">
                        <input type="text" name="en|{{$key}}" value=" {{ $review }}" style="width:100%;">
                    </td>
                    @foreach($trans['vi'] as $vi_key=>$vi_val)
                        @if($vi_key == $key)
                            <td class="email ">
                                <input type="text" name="vi|{{$vi_key}}" value=" {{ $vi_val }}" style="width: 100%">
                            </td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>

        <br/>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>