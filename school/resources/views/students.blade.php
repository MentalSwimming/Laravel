@extends('layouts.app')
@if(session('pesan'))
		alert({{session('pesan')}})
@endif
@section('content')
<table id = "datatable">
  <thead>
    <tr>
        <th> Id </th>
        <th> Name </th>
        <th> Email </th>
        <th> Short Description </th>
        <th> Edit Button </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($siswa as $s) : ?>
        <tr>
        <td> <?php echo $s->id  ?> </td>
            <td> <?php echo $s->name  ?> </td>
            <td> <?php echo $s->email  ?> </td>
            <td> <?php echo $s->short_description ?> </td>
            <td> <?php echo "<button class = 'edit'> Launch Modal </button>" ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
{{ $siswa->links() }}

<div id="editStudentModal" class = "modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id ="modal-content">
      <form action="students/edit" method = "post">
          @csrf
          Id <input type="text" name = "id" id= "editid" value="{{ old('id') }}" > <br>
          Name <input type="text" name = "name" id= "editname" value="{{ old('name') }}" > <br>
          Email <input type ="email" name = "email" id = "editemail" value = "{{old('email')}}"> <br>
          Short Description <input name = "shortdescription" type ="text" id = "editdesc" value = "{{old('shortdescription')}}"> <br>
          <button type="submit"> Tambah Data</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- <script>
    $('#myModal').on('show.bs.modal', function (event) {
    var recipient = "Winston"
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
  })
  function openModal() {
    $('#editStudentModal').modal('show');
  }
</script> -->
@endsection