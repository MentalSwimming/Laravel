@extends('layouts.app')
@section('content')
<table>
    <tr>
        <th> Name </th>
        <th> Email </th>
        <th> Short Description </th>
    </tr>
    <?php foreach($siswa as $s) : ?>
        <tr>
            <td> <?php echo $s->name  ?> </td>
            <td> <?php echo $s->email  ?> </td>
            <td> <?php echo $s->short_description ?> </td>
        </tr>
    <?php endforeach; ?>
</table>
{{ $siswa->links() }}
@endsection