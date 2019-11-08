@extends('landingpage.layouts.master')

@section('header')
<link rel="stylesheet" href="{{ asset('storefront/css/theme1.css') }}" type="text/css" media="all" />
<link rel="stylesheet" href="{{ asset('storefront/css/loader.css') }}" type="text/css" media="all" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endsection

@section('content')
<!-- Button trigger modal -->
<button type="button" data-toggle="modal" data-target="#popup-modal">
    Large modal
</button>

<!-- Modal -->

<div id="popup-modal" class="ult-upsell modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog popup-modal-dialog popup-modal-lg">
        <div class="popup-modal-content">
            <div class="popup-modal-body ult-upsell-modal-body">
                {{-- Insert modal content here --}}
                <div class="text-center">
                    <div class="lds-ripple"><div></div><div></div></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
    let data = {
        id: 77,
        store_hash: "cy1gko03q0"
    };
    $.get( "/api/popup-content", data )
        .done(function(data) {
            $('.ult-upsell-modal-body').html(data);
        });
});
</script>
@endsection

@section('script')
<script src="{{ asset('landingpage/js/util.js') }}"></script> <!-- util functions included in the CodyHouse framework -->
<script src="{{ asset('landingpage/js/main.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
