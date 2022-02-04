<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo List</title>
  <link rel="stylesheet" href="/resources/css/reset.css">
  <style>
    .container {
      background-color: #2d197c;
      height: 100vh;
      width: 100vw;
      position: relative;
    }

    .card {
      background-color: #fff;
      width: 50vw;
      padding: 30px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border-radius: 10px;
    }

    .title {
      font-weight: bold;
      font-size: 24px;
    }

    .mb-15 {
      margin-bottom: 15px;
    }

    .mb-30 {
      margin-bottom: 30px;
    }

    .between {
      justify-content: space-between;
    }

    .flex {
      display: flex;
    }

    .input-add {
      width: 80%;
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 14px;
      outline: none;
    }

    .button-add {
      text-align: left;
      border: 2px solid #dc70fa;
      font-size: 12px;
      color: #dc70fa;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }

    table {
      text-align: center;
      width: 100%;
    }

    tr {
      height: 50px;
    }

    .input-update {
      width: 90%;
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 14px;
      outline: none;
    }

    .button-update {
      text-align: left;
      border: 2px solid #fa9770;
      font-size: 12px;
      color: #fa9770;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    .button-delete {
      text-align: left;
      border: 2px solid #71fadc;
      font-size: 12px;
      color: #71fadc;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="card">
      <p class="title mb-15">Todo List</p>
      <div class="todo">
        <form action="/todo/create" method="post" class="flex between mb-30">
          @csrf
          <input type="text" name="content" class="input-add">
          <input type="submit" value="追加" class="button-add">
        </form>
        <table>
          <tbody>
            <tr>
              <th>作成日</th>
              <th>タスク名</th>
              <th>更新</th>
              <th>削除</th>
            </tr>
            @foreach ($items as $item)
            <tr>
              <td>{{$item->updated_at}}</td>
              <form action="/todo/update" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$item->id}}">
                <td><input type="text" class="input-update" name="content" value="{{$item->content}}"></td>
                <td><button class="button-update">更新</button></td>
              </form>
              <td>
                <form action="/todo/delete" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{$item->id}}">
                  <button class="button-delete">削除</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>