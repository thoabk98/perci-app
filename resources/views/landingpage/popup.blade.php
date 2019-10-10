@extends('landingpage.layouts.master')

@section('header')
<link rel="stylesheet" href="{{ asset('landingpage/css/popup.css') }}" type="text/css" media="all" />
@endsection

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
    Large modal
</button>

<!-- Modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg store-popup">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-component px-5 pt-4 ">
                    <h3>LIMITED TIME OFFER!</h3>
                </div>
                <div class="text-component px-5 pt-2">Add these Items and Save</div>
            
                <div class="row text-component mx-0 px-4 py-5">
                    <div class="col-lg-6 pl-4 pb-4 text-left"><img class="border border-secondary rounded" width="290" src="{{ asset('landingpage/images/g3.jpg') }}" class="img-fluid" alt="" /></div>
                    <div class="col-lg-6 pb-2 text-left">
                        <h4>Apple Macbook Pro</h4>
                        <ul class="pb-4">
                            <li class="pt-1">Laptop - Classic Rose</li>
                            <li class="py-3"><s class="text-muted">$990.00</s><span class="ml-3 text-success">$890.00</span></li>
                            <li class="pb-1">Colors</li>
                            <ul>
                                <li class="d-inline"><button type="button" class="px-0 mr-2 color-picker btn btn-info rounded-circle"></button></li>
                                <li class="d-inline"><button type="button" class="px-0 mr-2 color-picker btn btn-danger rounded-circle"></button></li>
                            </ul>
                        </ul>
                        <button type="button" class="btn btn-success rounded font-weight-bold col-sm-6">Add to cart</button>
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
<script>
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
</script>
@endsection