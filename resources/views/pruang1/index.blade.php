@foreach($data_ruang as $ruang)
<div class="box" style='width:170px; height:200px; background-color:lightgreen; border-radius:15px; display:inline-block'>
    <div class="ruang" style='color:black; text-align:center; padding-top:15px'>
    {{$ruang->ruang}}
    </div>
    <div class="okupasi" style='color:black; text-align:center; line-height:120px'>
    
    @if($ruang->status == 0)
                        KOSONG
                    @else
                        {{$ruang->platNomor}}
                    @endif
                    
    </div>
    <div class="tombol" style='text-align:center; padding-top:5px'>
    <a href="/pruang1/{{$ruang->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
    </div>
</div>
@endforeach