@extends('layouts.app')
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
@endpush
@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endpush


@section('content')
<div id="dropzone">
    <form action="{{route('race.storeimages', $race)}}" class="dropzone" id="file-upload" enctype="multipart/form-data">
        @csrf
        <div class="dz-message">
            Arrastre y suelte imágenes individuales/múltiples aquí<br>
        </div>
    </form>
</div>
@endsection