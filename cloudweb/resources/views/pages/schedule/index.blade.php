@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0"></h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Master Schedule</a>
            </li>
            <li class="breadcrumb-item active">Site
            </li>
          </ol>
        </div>
      </div>
    </div>

    <div class="content-header-right text-md-right col-md-6 col-12">
      <div class="form-group">
        
        <button type="button" class="btn btn-round btn-primary" data-toggle="modal"
        data-backdrop="false" data-target="" id="add-schedule-button">  <i class="ft-plus"></i> Add Schedule
      </button>
    </div>
  </div>
</div>
<div class="content-body">
  <section id="ordering">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-content collapse show">
            <div class="card-body card-dashboard">
              <div class="table-responsive">
                <table id="table_mtask" class="table table-striped table-bordered default-ordering">
                  <thead>
                    <tr>
                    <th style="width:1%">No</th>
                      <th style="width:20%">Materi</th>
                      <th style="width:20%">Waktu</th>
                      <th style="width:20%">Link</th>
                      <th style="width:30%">Requirement</th>
                      <th style="width:19%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if(count($datas) > 0)
                  @foreach($datas as $data)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->description }}</td>
                    <td>{{ $data->time_schedule }}</td>
                    <td>{{ $data->url }}</td>
                    <td>{{ $data->requirement }}</td>
                    <td><button id="btn-update" data-id="{{$data->id}}" type="button" class="btn btn-sm btn-warning"><i class="ft-edit-2"></i></button>
                     <button id="btn-delete" data-id="{{$data->id}}" type="button" class="btn btn-sm btn-danger"><i class="ft-trash-2"></i></button></td>
                  @endforeach
                  @else
                  <td colspan="6">Data Not Found</td>
                  @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
</div>

<div class="modal fade text-left modal_form" id="schedule_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11" aria-hidden="true" style="overflow: scroll">
  <div class="modal-dialog modal-lg" role="document">
    <form id="schedule_form" method="POST" action="#" autocomplete="off">
      @csrf
      <div class="modal-content">
        <div class="modal-header bg-info white">
          <h4 class="modal-title white" id="myModalLabel11">Add Schedule Form</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
            <input type="hidden" id="schedule-id" name="id">
            <fieldset class="form-group floating-label-form-group">
                <label>Materi</label>
                  <textarea id="description" name="description" placeholder="Materi" class="form-control mb-1"></textarea>
            </fieldset>
            <fieldset class="form-group floating-label-form-group">
            <label for="site_id">Waktu</label>
                <input type="text" class="form-control" id="date_time" name="date_time" placeholder="Datetime">
            </fieldset>  
            <fieldset class="form-group floating-label-form-group">
                <label for="site_id">Link</label>
                <input type="text" class="form-control" id="url" placeholder="Url">
            </fieldset>  
            <fieldset class="form-group floating-label-form-group">
                <label>Requirement</label>
                <div class="controls">
                  <textarea id="requirement" name="requirement" placeholder="Requirement" class="form-control mb-1"></textarea>
                </div>
            </fieldset>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-outline-info" value="Submit">
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
@section('schedule-js')
<script>
$(document).ready(function(){
    $("#date_time").daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
        format: 'MMMM D hh:mm A'
        }
    });

    $(document).on('click', '#add-schedule-button', function(e){
        e.preventDefault();   
        $("#schedule_modal").modal('show');
    }); 

    

    $(".modal").on("hidden.bs.modal", function(){
        $('#schedule_form').trigger("reset");
    });

    $(document).on('click', '#btn-update', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        console.log("id", id);   
        $("#schedule_modal").modal('show');
        $('#schedule-id').val(id); 

        $.ajax({
              type: 'GET',
              url: "{{ route('schedule.data') }}",
              dataType: 'json',
              data: {id: id},
              success: function(data) {               
                $('#description').val(data.description);
                $('#date_time').val(data.time_schedule);
                $('#url').val(data.url);
                $('#requirement').val(data.requirement); 
              }, 
              error: function(data, xhr, status){
                    // toas.error(data.responseJSON.message);
                }
            });

    });

    $(document).on('click', '#btn-delete', function(e) {
      var id = $(this).data('id'); 
      swal({
                title: "Apakah anda yakin untuk update DATEK NOT OK?",
                text: "Klik cancel untuk membatalkan",
                buttons: true,
                dangerMode: true
      }).then((isReady) => {
                if (!isReady) {
                    throw null;
                }
                $.ajax({
                    type: 'POST',
                    data: {id : id},
                    url: "{{ route('schedule.delete') }}",
                    success: function(data) {
                        location.reload(); 
                    }
                });
            }); 
      e.preventDefault();
    });

    $(document).on('submit', '#schedule_form', function(e){
        e.preventDefault(); 
        var form_data = $("#schedule_form").serializeArray();

        $.ajax({
              type: 'POST',
              url: "{{ route('schedule.post') }}",
              dataType: 'json',
              data: form_data,
              success: function(data) {
                swal({
                        title: "Good job!",
                        text: "Data Submitted!",
                        icon: "success",
                    }).then(function() {
                        $("#schedule_modal").modal('hide');
                        location.reload(); 
                    });
              }, 
              error: function(data, xhr, status){
                    // toas.error(data.responseJSON.message);
                }
            });
    }); 
}); 
</script>
@endsection