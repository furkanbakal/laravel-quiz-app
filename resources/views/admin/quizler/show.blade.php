<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>
  <div class="card">
  <div class="card-body">
       <h5 class="card-title">
    <a href="{{route('quizler.index')}}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i> Quizlere Dön</a>
    </h5>
    <div class="row">
        <div class="col-md-4">
          <ul class="list-group">
        
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
     
        <table class="table table-bordered mt-3">
  <thead>
    <tr>
      <th scope="col">Ad Soyad</th>
      <th scope="col">Aldığı Puan</th>
      
    </tr>
  </thead>
  <tbody>
      @foreach($quiz->results as $result)
    <tr>
      <td> {{$result->user->name}} </td>
      <td> {{$result->point}} </td>
      
    </tr>
    @endforeach
  </tbody>
</table>
    </div>
  </div>
</div>
      </div>

</x-app-layout>
