<x-app-layout>
<x-slot name="header">Quizi Güncelle</x-slot>
<div class="card">
<div class="card-body">
<form action="{{route('quizler.update',$quiz->id)}}" method="POST">
    @method('PUT')
@csrf
<div class="form-group">
<label >Ouiz Başlığı</label>
<input type="text" name="title" class="form-control" value="{{$quiz->title}}">
</div>
<div class="form-group">
<label >Ouiz Açıklama</label>
<textarea name="description" class="form-control" rows="4">{{$quiz->description}}</textarea>
</div>
<div class="form-group">
    <label>Quiz Durumu</label>
    <select name="status" class="form-control">
        <option @if($quiz->status==="publish") selected @endif value="publish">Aktif</option>
        <option @if($quiz->status==="passive") selected @endif value="passive">Pasif</option>
        <option @if($quiz->status==="draft") selected @endif value="draft">Taslak</option>
    </select>
</div>
<div class="form-group">
<input id="isFinished" @if($quiz->finished_at) checked @endif type="checkbox">
<label>Bitiş tarihi olcak mı?</label>
</div>
<div id="finishedInput" @if(!$quiz->finished_at) style="display:none" @endif class="form-group">
<label >Bitiş Tarihi</label>
<input type="datetime-local" name="finished_at" value="{{ date('Y-m-d\TH:i', strtotime($quiz->finished_at) ) }}" class="form-group">
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary btn-sm btn-block">Düzenle</button>
</div>
</form>
</div>
</div>
<x-slot name="js">
<script>
$('#isFinished').change(function () {
   if($('#isFinished').is(':checked')){
       $('#finishedInput').show();
   }
   else{
       $('#finishedInput').hide();
   }
});
</script>
</x-slot>

</x-app-layout>