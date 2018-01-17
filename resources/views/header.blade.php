@extends ('layouts.app')
@section('content')
    <div class="menu">
<div class="bunches">
    <a href="http://task.loc/bunches"><h2>Bunches</h2></a>
</div>
<div class="templates">
    <a href="http://task.loc/templates"><h2>Templates</h2></a>
</div>
<div class="campaign">
    <a href="http://task.loc/campaign"><h2>Campaign</h2></a>
</div>
@yield('list')
        </div>
@endsection