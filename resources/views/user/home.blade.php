{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @yield('content_header')
@stop
@section('content')
    @yield('content')
@stop
@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop
@section('js')
    <script type="text/javascript">
    $( document ).ready(function() {
      $("#filterData").hide();
      $("#showFilter").click(function(){
        $("#filterData").toggle();
      })
    });
    $(function() {
        $('.table').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
      $("select[name='kategori_id']").change(function(){
      var kategori_id = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "<?php echo url('user/subkategori2/selectajax') ?>",
          method: 'post',
          data: {kategori_id:kategori_id, _token:token},
          success: function(data) {
            $("select[name='subkategori1s_id'").html('');
            $("select[name='subkategori1s_id'").html(data.options);
            subkategori_id = $("select[name='subkategori1s_id'").val();
            $.ajax({
              url: "<?php echo url('user/subkategori2/selectajax2') ?>",
              method: 'post',
              data: {subkategori_id:subkategori_id, _token:token},
              success: function(data) {
                $("select[name='subkategori2s_id'").html('');
                $("select[name='subkategori2s_id'").html(data.options);
              }
            });
          }
      });
  });
    $("select[name='subkategori1s_id']").change(function(){
    var subkategori_id = $(this).val();
    var token = $("input[name='_token']").val();
    $.ajax({
        url: "<?php echo url('user/subkategori2/selectajax2') ?>",
        method: 'post',
        data: {subkategori_id:subkategori_id, _token:token},
        success: function(data) {
          $("select[name='subkategori2s_id'").html('');
          $("select[name='subkategori2s_id'").html(data.options);
        }
    });
  });
    </script>
@stop
