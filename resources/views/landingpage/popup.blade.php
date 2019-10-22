@extends('landingpage.layouts.master')

@section('header')
<link rel="stylesheet" href="{{ asset('landingpage/css/popup.css') }}" type="text/css" media="all" />
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
            <div class="popup-modal-body">
                <div class="popup-title">
                    <h3>LIMITED TIME OFFER!</h3>
                </div>
                <div class="popup-des">Add these Items and Save</div>

                <div class="flex popup-content">
                    <div class="column left-container "><img class="round-border" width="290" src="{{ asset('landingpage/images/g3.jpg') }}" class="img-fluid" alt="" /></div>
                    <div class="column right-container ">
                        <h4>Apple Macbook Pro</h4>
                        <ul class="info">
                            <li class="name">Laptop - Classic Rose</li>
                            <li class="price"><s style="color: #6c757d;">$990.00</s><span style="color: #28a745; margin-left: 1rem;">$890.00</span></li>
                            <li class="color">Colors</li>
                            <ul>
                                <li class="inline"><button type="button" class="color-picker popup-button"></button></li>
                                <li class="inline"><button type="button" class="color-picker popup-button"></button></li>
                            </ul>
                        </ul>
                        <button type="button" class="add-to-cart popup-button round-border column">Add to cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('script')
<script src="{{ asset('landingpage/js/util.js') }}"></script> <!-- util functions included in the CodyHouse framework -->
<script src="{{ asset('landingpage/js/main.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
