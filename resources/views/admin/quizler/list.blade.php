<x-app-layout>
    <x-slot name="header">Quizler</x-slot>
    <div class="card">
    <div class="card-body">
      
    <h5 class="card-title float-right">
    <a href="{{route('quizler.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Quiz Oluştur</a>
    </h5>
    

      <form action="" method="GET">
        <div class="form-row">
          <div class="col-md-2">
            <input type="text" placeholder="quiz adı" name="title" value="{{request()->get('title')}}" class="form-control">
          </div>
          <div class="col-md-2">
            <select name="status" onchange="this.form.submit()" class="form-control">
              <option value="">Durum Seçiniz</option>
              <option  @if(request()->get('status')=='publish') selected @endif value="publish">Aktif</option>
              <option  @if(request()->get('status')=='publish') selected @endif value="passive">Pasif</option>
              <option  @if(request()->get('status')=='publish') selected @endif value="draft">Taslak</option>
            </select>
          </div>
          @if(request()->get('title') || request()->get('status'))
          <div class="col-md-2">
            <a href="{{route('quizler.index')}}" class="btn btn-secondary">Sıfırla</a>
          </div>
          @endif
        </div>
      </form>

    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Quiz</th>
      <th scope="col">Soru Sayısı</th>
      <th scope="col">Durum</th>
      <th scope="col">Bitiş Tarihi</th>
      <th scope="col">İşlemler</th>
    </tr>
  </thead>
  <tbody>
  @foreach($quizzes as $quiz)
    <tr>
      <td scope="row">{{$quiz->title}}</td>
      <td>{{$quiz->question_count}}</td>
      <td>
        @switch($quiz->status)
            @case('publish')

            @if(!$quiz->finished_at)
                 <span class="badge badge-success">Aktif</span>
              @elseif( $quiz->finished_at>now())
                      <span class="badge badge-success">Aktif</span>
            @else
                       <span class="badge badge-secondary text-white">Tarihi Dolmuş</span>
                   
            @endif        
                @break
            @case('passive')
                      <span class="badge badge-danger">Pasif</span>
                @break
            @case('draft')
                      <span class="badge badge-warning">Taslak</span>
                @break
                
        @endswitch
      </td>
      <td>{{$quiz->finished_at}}</td>
      <td>
      <a href="{{route('quizler.details',$quiz->id)}}" class="btn bnt-sm btn-secondary"><i class="fa fa-info-circle"></i></a>
      <a href="{{route('questions.index',$quiz->id)}}" class="btn bnt-sm btn-warning"><i class="fa fa-question"></i></a>
      <a href="{{route('quizler.edit',$quiz->id)}}" class="btn bnt-sm btn-primary"><i class="fa fa-pen"></i></a>
      <a href="{{route('quizler.destroy',$quiz->id)}}" class="btn bnt-sm btn-danger"><i class="fa fa-times"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table> 
{{$quizzes->withQueryString()->links()}}
    </div>
    </div>
</x-app-layout>
