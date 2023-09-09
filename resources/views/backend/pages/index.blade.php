@extends('backend.layouts.defaults')
@section('title')
Dashboard
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <?php
            if (extension_loaded('gd')) {
                echo 'GD is installed.';
            } else {
                echo 'GD is not installed.';
            }
            ?>
    </div>
</div>

@endsection
@section('scripts')

@endsection
