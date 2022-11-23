<section class="content-header">
    <h1>
        {{ $title }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        @if(isset($itemOne) && isset($itemOneUrl))
        <li><a href="{{ route($itemOneUrl) }}">{{ $itemOne }}</a></li>
        @endif
        <li class="active">{{ $activePage }}</li>
    </ol>
</section>