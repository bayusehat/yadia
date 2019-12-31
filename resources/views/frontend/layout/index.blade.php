@include('frontend.layout.head')
@if($data['content']) {{ view($data['content'],$data) }} @endif
@include('frontend.layout.foot')