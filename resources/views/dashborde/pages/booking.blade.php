@include('dashborde.include.top')

<div class="container-scroller">
    @include('dashborde.include.navbar')
    <div class="container-fluid page-body-wrapper">
        @include('dashborde.include.sidebar')
        @yield('content')
        <div class="container-fluid p-3"> <!-- تعديل هنا -->
            <div class="table-responsive" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
                <table class="table table-bordered table-striped table-hover w-100" style="table-layout: fixed;">
                    <thead class="bg-light">
                        <tr>
                            <th style="width: 5%">ID</th>
                            <th style="width: 15%">service_id</th>
                            <th style="width: 15%">user_id</th>
                            <th style="width: 15%">booking_date</th>
                            <th style="width: 15%">booking_time</th>
                            <th style="width: 15%">status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td class="text-truncate">{{$data->id}}</td>
                                <td class="text-wrap">{{$data->service_id}}</td>
                                <td class="text-wrap">{{$data->user_id}}</td>
                                <td class="text-wrap">{{$data->booking_date}}</td>
                                <td class="text-wrap">{{$data->booking_time}}</td>
                                <td class="text-wrap" style="white-space: normal; word-break: break-word;">{{$data->status}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('dashborde.include.footer')
</div>

@include('dashborde.include.end')