
@extends('layouts.app')

<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<!-- Styles -->
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 80vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }


    .m-b-md {
        margin-bottom: 30px;
    }
</style>

@section('content')
    <div class="flex-center position-ref full-height">
    <div class="content">

            <div class="title m-b-md">
                {{ config('app.name', 'Laravel') }}
            </div>

    </div>
</div>
@endsection
