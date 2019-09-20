@extends('dashboard::layouts.dashboard')

@section('dashboard-home')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Dashboard</h1>

    <div class="row placeholders">
      <div class="col-xs-6 col-sm-3 placeholder">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Label</h4>
        <span class="text-muted">Something else</span>
      </div>
      <div class="col-xs-6 col-sm-3 placeholder">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Label</h4>
        <span class="text-muted">Something else</span>
      </div>
      <div class="col-xs-6 col-sm-3 placeholder">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Label</h4>
        <span class="text-muted">Something else</span>
      </div>
      <div class="col-xs-6 col-sm-3 placeholder">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Label</h4>
        <span class="text-muted">Something else</span>
      </div>
    </div>

    <h2 class="sub-header">Log</h2>
    <div class="table-responsive">
      <table id="example" class=" display cell-border" style="width:100%">
          <thead>
             <tr>
                <th>Method</th>
                <th>Route</th>
                <th>Ip</th>
                <th>Type</th>
                <th>Duration</th>

                <th style="width:100px" >Created at</th>
                <th>Details</th>
             </tr>
          </thead>
       </table>

    </div>
</div>
@endsection

@section('script')

<script>
  $(document).ready(function() {
      $('#example').DataTable( {
          "ajax": "{{url('/api/logs')}}",
              "dataType": "jsonp",
              "serverSide": true,

          // "columns": [
          //     { "data": "route" },
          //     { "data": "request" },
          //     { "data": "exception" },
          //     // { "data": "headers" },
          //     // { "data": "extras" },
          //     { "data": "created_at" }
          // ],

          "columnDefs": [ {
          "targets": 0,
          "data": "method",
          "render": function ( data, type, row, meta ) {
          return data;
          }
          } ,{
          "targets": 1,
          "data": "path",
          "render": function ( data, type, row, meta ) {
              return data;
          }
          } , {
          "targets": 2,
          "data": "ip",
          "render": function ( data, type, row, meta ) {
          // return "<pre class='jsonBeauty'>"+data.replace(new RegExp('","', 'g'), '",\n"')+"</pre>";
          return "<pre class='jsonBeauty'>"+data+"</pre>";
          }
          },{
          "targets": 3,
          "data": "type",
          "render": function ( data, type, row, meta ) {
          return data;
          }
          },{
          "targets": 4,
          "data": "duration",
          "render": function ( data, type, row, meta ) {
          return data;
          }
          },{
          "targets": 5,
          "data": "created_at",
          "render": function ( data, type, row, meta ) {
              var data=new Date(data.split(' ')[0]);

          return data.toDateString()+'\n'+data.toTimeString().split(' ')[0];
          }
          },{
          "targets": 6,
          "data": "id",
          "render": function ( data, type, row, meta ) {
          return '<a><button type="button" class="btn btn-info">#'+data+'</button></a>';
          }
          } ],

      } );
  } );

  function isJson(str) {
      try {
          JSON.parse(str);
      } catch (e) {
          return false;
      }
      return true;
  }

</script>
@endsection
