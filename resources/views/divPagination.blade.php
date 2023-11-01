<div class="div_pagination">
@if(isset($dataview))
{{$dataview->appends(request()->all())->links('pagination')}}
      <script>
        let txt =  'Tổng: ' + {{$dataview->total()}} + ' dòng,' + {{$dataview->lastPage()}} + ' trang';
        $(".total_record").text(txt);
      </script>
@endif
</div>