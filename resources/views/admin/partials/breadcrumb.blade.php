<section class="content-header">
    <h1>
        {{ $title }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="@if(Auth::user()->role->slug === 'admin'){{ route('admin-dashboard') }}@elseif(Auth::user()->role->slug === 'editor'){{ route('editor-dashboard') }}@elseif(Auth::user()->role->slug === 'viewer'){{ route('viewer-dashboard') }}@endif"><i class="fa fa-dashboard"></i> Home</a></li>
        @if(isset($itemOne) && isset($itemOneUrl))
        <li><a href="{{ route($itemOneUrl) }}">{{ $itemOne }}</a></li>
        @endif
        <li class="active">{{ $activePage }}</li>
    </ol>
</section>