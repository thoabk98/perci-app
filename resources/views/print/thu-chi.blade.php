<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @foreach($cssFiles as $css)
        <link rel="stylesheet" href="{{ asset($css) }}">
    @endforeach
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body onload="window.print()">
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice print">
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table borderless">
                    <tbody>
                    <tr>
                        <td colspan="6" class="text-right">
                            <b>Trung tâm đào tạo lái xe Ngọc Hà</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <div class="text-center">
                                <h2><b>@if($t->type==1) PHIẾU THU @else PHIẾU CHI @endif</b></h2>
                                <h5><b><i>Ngày {{date('d', strtotime($t->date))}} tháng {{date('m', strtotime($t->date))}} năm {{date('Y', strtotime($t->date))
                                }}</i></b></h5>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div>
                                <span>@if($t->type==1) Họ và tên người nộp: @else Họ và tên người nhận: @endif</span> <b>{{ $t->user->name }}</b>
                            </div>
                        </td>
                        <td colspan="3">
                            <div>
                                <span>SĐT:</span> <b>{{ $t->user->phone }}</b>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <div>
                                <span>Số tiền: </span> <b>{{ number_format($t->amount) }}đ</b>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <div>
                                <span>Lí do: </span> <b>{{ $t->content }}</b>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="text-center">
                                <h4><b>Nhân viên</b></h4>
                                <span>(ký và ghi rõ họ tên)</span>
                                <h4 class="name"><b>{{ $t->admin->name }}</b></h4>
                            </div>
                        </td>
                        <td colspan="3">
                            <div class="text-center">
                                <h4><b>@if($t->type==1) Người nộp @else Người nhận @endif</b></h4>
                                <span>(ký và ghi rõ họ tên)</span>
                                <h4 class="name"><b>{{ $t->user->name }}</b></h4>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
</body>
</html>
