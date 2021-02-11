<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>
  <div class="card">
  <div class="card-body">
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
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Katılımcı Sayısı
    <span class="badge badge-secondary badge-pill">100</span>
  </li>
</ul>               
            
        </div>
        <div class="col-md-8">
            <p>{{$quiz->description}}</p>
    <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-primary btn-block btn-sm">Sınava Katıl</a>

        </div>
    </div>
  </div>
</div>
      </div>

</x-app-layout>
