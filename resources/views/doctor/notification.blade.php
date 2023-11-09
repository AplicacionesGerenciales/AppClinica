@extends('layouts.panel')

@section('template_title')
    Patient
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <h4 style="color: #ffffff; margin-bottom:3%; margin-left:2%">Gestión / Notificaciones</h4>
      <div class="card">
        <div class="card-header">
          Notificaciones no leídas 
        </div>
        <div class="card-body">

          @if (auth()->user())
          @forelse ($postNotifications as $notification)
          <div class="alert alert-info" role="alert">
            <strong class="text-info">Destinatario:</strong> {{ $notification->data['name'] }}<br>
            <strong class="text-info">Asunto: </strong>{{ $notification->data['affair'] }}<br>
            <strong class="text-info">Mensaje: </strong>{{ $notification->data['message'] }}<br>
            <p>{{ $notification->created_at->diffForHumans() }}</p>
            <button type="submit" class="mark-as-read btn btn-sm btn-primary" data-id="{{ $notification->id }}">Marcar como leido</button>
          </div>
          @if ($loop->last)
            <a href="#" id="mark-all" class="btn btn-success float-right">Marcar todo como leido</a>
              
          @endif
          
          @empty
          No hay notificaciones                  
          @endforelse
                      
          @endif
                        
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
function sendMarkRequest(id = null){
  return $.ajax("{{ route('markNotification') }}", {
    method: 'POST',
    data: {
      _token: "{{ csrf_token() }}",
      id
    }
  });
}

$(function(){
  $('.mark-as-read').click(function(){
    let request = sendMarkRequest($(this).data('id'));

    request.done(() => {
      $(this).parents('div.alert').remove();
    });
  });

  $('#mark-all').click(function(){
    let request = sendMarkRequest();

    request.done(() => {
      $('div.alert').remove();
    })
  });
});
</script>
@endsection

