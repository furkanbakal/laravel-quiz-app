<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>
  <div class="card">
  <div class="card-body">
    <div class="row">
        <div class="col-md-4">
          <ul class="list-group">
            @if($quiz->my_Rank)
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Sıralamanız   
            <span class="badge badge-primary badge-pill">{{$quiz->my_rank}}</span>
          </li>
            @endif

            @if($quiz->my_result)
  <li class="list-group-item d-flex justify-content-between align-items-center">
     Puan:   
    <span class="badge badge-primary badge-pill">{{$quiz->my_result->point}}</span>
  </li>
      @endif
       @if($quiz->my_result)
     <li class="list-group-item d-flex justify-content-between align-items-center">
     Doğru / Yanlış Sayısı: 
     <div class="float-right">  
      <span class="badge badge-success badge-pill">{{$quiz->my_result->correct}} Doğru</span>
      <span class="badge badge-danger badge-pill">{{$quiz->my_result->wrong}} Yanlış</span>
    </div>
     </li>
     @endif
               @if($quiz->finished_at)
    <li class="list-group-item d-flex justify-content-between align-items-center">
     Sınav Bitiş Tarihi   
    <span title="{{$quiz->finished_at}}" class="badge badge-secondary badge-pill">{{$quiz->finished_at->diffForHumans()}}</span>
  </li>
               @endif 
 <li class="list-group-item d-flex justify-content-between align-items-center">
    Soru  Sayısı
    <span class="badge badge-secondary badge-pill">{{$quiz->question_count}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Sınav Süresi
    <span class="badge badge-secondary badge-pill">60</span>
  </li>
  @if($quiz->details)
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Katılımcı Sayısı
    <span class="badge badge-secondary badge-pill">{{$quiz->details['join_count']}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Ortalama Puan
    <span class="badge badge-secondary badge-pill">{{$quiz->details['average']}}</span>
  </li>
  @endif
</ul>               
      @if(count($quiz->topTen)>0)
      <div class="card mt-3">
      <div class="card-body">
        <h5 class="card-title">İlk 10</h5>
        <ul class="list-group">
          @foreach ($quiz->topTen as $result)
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong class="h4"> {{$loop->iteration}}. </strong> 
              <img class="w-8 h-8 rounded-full" src="{{$result->user->profile_photo_url}}">
                <span @if(auth()->user()->id==$result->user_id) class="text-danger" @endif>{{$result->user->name}}</span>
                <span class="badge badge-success badge-pill">{{$result->point}}</span>

            </li>
          @endforeach
          
        </ul>  
      </div>  
      </div>         
@endif
        </div>
        <div class="col-md-8">
            <p>{{$quiz->description}}</p>
            @if($quiz->my_result)
    <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-danger btn-block btn-sm">Sınavı Görüntüle</a>
            @elseif($quiz->finished_at>now())
    <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-primary btn-block btn-sm">Sınava Katıl</a>
          @endif
        </div>
    </div>
  </div>
</div>
      </div>

</x-app-layout>
