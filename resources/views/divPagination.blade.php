<div class="div_pagination">
@if(isset($dataview))
{{$dataview->appends(request()->all())->links('pagination')}}
      <script>
        let txt =  'Tổng: ' + {{$dataview->total()}} + ' dòng,' + {{$dataview->lastPage()}} + ' trang';
        $(".total_record").text(txt);
      </script>
@endif
</script>  
  @if(isset($rowperpage))
  <script>$("#select_perpage").val('{{$rowperpage}}')
  </script> <!-- Set selectbox value -->
  
  @endif
</div>