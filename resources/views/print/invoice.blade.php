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
                                <h2><b>PHIẾU THU</b></h2>
                                <h5><b><i>Ngày {{date('d', strtotime($user->created_at))}} tháng {{date('m', strtotime($user->created_at))}} năm {{date('Y', strtotime($user->created_at))
                                }}</i></b></h5>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div>
                                <span>Họ tên người nộp tiền:</span> <b>{{ $user->name }}</b>
                            </div>
                        </td>
                        <td colspan="3">
                            <div>
                                <span>CMT:</span> <b>{{ $user->passport }}</b>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div>
                                <span>Ngày sinh:</span> <b>{{ date('d-m-Y', strtotime($user->birth_day)) }}</b>
                            </div>
                        </td>
                        <td colspan="3">
                            <div>
                                <span>SĐT:</span> <b>{{ $user->mobile }}</b>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <div>
                                <span>Số tiền: </span> <b>{{ number_format($user->fee - $user->discount) }}đ</b>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <div>
                                <span>Lí do: </span> Đăng ký khóa học <b>{{ $user->course }}</b>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="text-center">
                                <h4><b>Nhân viên thu</b></h4>
                                <span>(ký và ghi rõ họ tên)</span>
                                <h4 class="name"><b>{{ $user->user }}</b></h4>
                            </div>
                        </td>
                        <td colspan="3">
                            <div class="text-center">
                                <h4><b>Người nộp</b></h4>
                                <span>(ký và ghi rõ họ tên)</span>
                                <h4 class="name"><b>{{ $user->name }}</b></h4>
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
