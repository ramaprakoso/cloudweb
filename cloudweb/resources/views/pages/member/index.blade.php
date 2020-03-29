@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0"></h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Schedule List</a>
            </li>
            <li class="breadcrumb-item active">Site
            </li>
          </ol>
        </div>
      </div>
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
                      <th style="width:25%">Materi</th>
                      <th style="width:20%">Waktu</th>
                      <th style="width:20%">Link</th>
                      <th style="width:30%">Requirement</th>
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
                    @endforeach
                  @else
                  <td colspan="5">Data Not Found</td>
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
    <form id="schedule_form" method="POST" action="#">
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
                <div class="row">
                    <div class="col-sm-4">Tanggal : <input type="text" class="form-control" id="date_time" name="date_time" placeholder="Tanggal"></div>
                    <div class="col-sm-4">Mulai : <input type="text" class="form-control" id="start_time" name="start_time" placeholder="Mulai"></div>
                    <div class="col-sm-4">Selesai :<input type="text" class="form-control" id="end_time" name="end_time" placeholder="Selesai"></div>
                    </div>
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
    $("#date_time").datepicker({
        dateFormat: "dd-mm-yy"
    });

    // $("#start_time").datetimepicker();

    // $("#end_time").datetimepicker();

    $(document).on('click', '#add-schedule-button', function(e){
        e.preventDefault();   
        $("#schedule_modal").modal('show');
    }); 

    $(document).on('click', '#btn-update', function(e){
        e.preventDefault();   
        $("#schedule_modal").modal('show');
        $('#schedule-id').val(id); 

        $.ajax({
              type: 'GET',
              url: "{{ route('schedule.data') }}",
              dataType: 'json',
              data: {id: id},
              success: function(data) {
                
                $('#description').val(data.description);
                $('#url').val(data.url);
                $('#requirement').val(data.requirement); 
              }, 
              error: function(data, xhr, status){
                    // toas.error(data.responseJSON.message);
                }
            });

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