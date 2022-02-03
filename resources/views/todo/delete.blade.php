@extends('index')
@section('content')
<tbody>
  <tr>
    <th>{{$table->timestamp}}</th>
    <td>{{$table->content}}</td>
    <td>
      <form action="/todo/delete" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$table->id}}">
        <button type="submit" class="">削除</button>
      </form>
    </td>
  </tr>
</tbody>
@endsection