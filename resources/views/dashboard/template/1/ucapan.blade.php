@foreach ($ucapans as $ucapan)
<div class="ucapan-card my-3 p-4">
    <p class="ucapan-txt">"{{$ucapan->ucapan}}"</p>
    <p class="ucapan-sender">{{$ucapan->guest_name}}</p>
</div>
@endforeach