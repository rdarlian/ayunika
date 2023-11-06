@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
  <h1 class="fw-bold fs-5 text-secondary">Users</h1>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-danger">
  <p>{{ $message }}</p>
</div>
@endif
{{-- {{dd($users)}} --}}
<div class="pb-5">
  <a href="{{ route('users.create')}}" class="btn btn-primary"><i class="fa fa-pencil"></i> Tambah User</a>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Username</th>
      <th scope="col">Period</th>
      <th scope="col">Exp Date</th>
      <th scope="col">Theme</th>
      <th scope="col">Tier</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <!--  {{$count = 0}} -->
    @foreach ($users as $item)
    <tr>
      <th scope="row">{{$count += 1}}</th>
      <td>{{$item->username}}</td>

      @php
      $to_date = strtotime($item->period_date);
      $from_date = strtotime($currentDate);
      $diff = (((int)$from_date - (int)$to_date))/86400;
      $day = (int)max(0, $item->period - $diff);

      $month = number_format(intval($day/30) , 0, "." , ",");
      $sisa = $day - $month * 30 ;
      $dayEnd = date('Y-m-d', strtotime($item->period_date. ' + '. $item->period . ' days'));
      @endphp
      @if($item->is_admin == 1)
      <td>-</td>
      <td>-</td>
      <td>-</td>
      <td>-</td>
      @else
      <td>
        @if($day >= 30 )
        {{ $month }} Bulan
        {{ $sisa }} Hari
        @elseif($day < 30 && $day> 0) {{ $sisa }} Hari @else <p class="text-danger">Expired</p>
          @endif
      </td>
      <td>
        {{ $dayEnd }}
      </td>
      <td>{{$item->theme}}</td>


      <td>
        @php
        $tierku = ["Basic", "Advance", "Premium"]
        @endphp

        {{ $tierku[$item->tier-1] }}
      </td>
      @endif
      <td>
        @if ($item->is_admin != 1)
        User
        @else
        Admin
        @endif
      </td>
      <td>
        <form action="{{ route('users.destroy', $item->id) }}" method="POST">
          @csrf
          <a href="{{ route('users.edit', $item->id) }}" class="btn btn-success ">
            <i class="fa fa-pencil"></i>
          </a>
          @method('delete')
          <button type="submit" href="javascript:void(0)" id="btn-delete-post" data-id="{{ $item->id }}" data-username="{{$item->username}}" class="btn btn-danger "><i class="fa fa-trash"></i></button>
        </form>

      </td>


    </tr>
    @endforeach
    @include('components.delete')



  </tbody>
  {{-- {!! $users->links() !!} --}}
</table>


<script type="module">
  function openModal() {
    $('#myModal').modal('show');
  }

  function closeModal() {
    $('#myModal').modal('hide');
  }

  // create a Jcrop instance
  let jcrop;

  // add a change event listener to the input tag
  $('#input-file').on('change', function() {
    // get the selected file
    let file = this.files[0];

    // create a FileReader object
    let reader = new FileReader();

    // set the onload event listener for the FileReader
    reader.onload = function(event) {
      // create an img tag with the loaded image
      let img = $('<img>').attr('src', event.target.result);

      // append the img tag to the jcrop container
      $('#jcrop-container').empty().append(img);

      // initialize Jcrop with the img tag
      img.on('load', function() {
        jcrop = $.Jcrop(img, {
          aspectRatio: 2 / 3,
          onSelect: updateCoords
        });
      });
    };

    // read the selected file as a data URL
    reader.readAsDataURL(file);
  });

  // update the crop coordinates
  function updateCoords(c) {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  }

  // submit the form
  $('#submit-button').on('click', function() {
    // get the crop coordinates
    var x = $('#x').val();
    var y = $('#y').val();
    var w = $('#w').val();
    var h = $('#h').val();

    // submit the form data using Ajax
    $.ajax({
      type: 'POST',
      url: '/crop',
      data: {
        x: x,
        y: y,
        w: w,
        h: h
      },
      success: function(response) {
        // handle the response
      },
      error: function(xhr, status, error) {
        // handle the error
      }
    });
  });
</script>
<script type="module">
  $(function() {
    $('.toggle-class').change(function() {
      var status = $(this).prop('checked') == true ? 1 : 0;
      console.log(status)
      var id = $(this).data('id');
      console.log(id)
      $.ajax({

        type: "GET",
        dataType: "json",
        url: '/status/update',
        data: {
          'status': status,
          'id': id
        },
        success: function(data) {
          console.log(data.success)
        }
      });
    })
  });
</script>
@endsection