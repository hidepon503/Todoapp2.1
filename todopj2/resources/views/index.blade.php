<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  <style>
    body {
      font-size:16px;
      background-color:#2D197C;
    }

    .container {
      width:100%;
      height: 600px;
      display:flex;
      justify-content:center;
      align-items:center;
    }

    .todolist {
      width: 60%;
      margin-top:20%;
      position: absolute;
      padding:20px;
      background-color:#ffffff;
      border-radius: 20px;
    }

    .todolist_headder {
      width: 100%;
      height:auto;
      display: flex;
      justify-content: space-between;
    }

    .todolist_headder_title{
      font-size:30px;
      font-weight:bold;
    }
    .todolist_headder_item {
      display: flex;
      margin-right:-50px;
      align-items:center;
      justify-content: flex-end;
    }

    .todolist_headder_item_logout {
      width:250px;
    }

     .todolist_headder_item_logout_button {
      width:120px;
      height: 35px;
      margin-left:30px;
      background-color:#FFFFFF;
      border-color:#FF8080;
      color:#FF8080;
      border-radius:5px;
    }

    .todolist_find {
    }

    .todolist_find_button {
      width:100px;
      height: 35px;
      margin: -20px 0 10px 0px;
      background-color:#FFFFFF;
      border-color:#CDF119;
      color:#CDF119;
      border-radius:5px;
    }

    .todolist_warning {
      margin-left:-30px;
    }

    .todolist_task-create-form{
      width:80%;
      height: 30px;
      border-radius: 5px;
      border-color: #E6E6E6;
    }
    
    .todolist_table {
      margin-top:20px;
      width: 100%;
      text-align:center;
    }
   
    .todolist_task-create-bottun {
      width:10%;
      height: 35px;
      margin-left:30px;
      background-color:#FFFFFF;
      border-color:#e181fb;
      color:#e181fb;
      border-radius:5px;
    }

    .todolist_table_edit_form {
      width:100%;
      height:25px;
      border-radius:5px;
      border-color: #E6E6E6;
    }

    .todolist_table-select-tag{
      height:30px;
      border-radius:5px;
      border-color: #E6E6E6;
    }

    .todolist_table-edit-bottun{
      width:60px;
      height: 35px;
      background-color:#FFFFFF;
      border-color: #f99770;;
      color:#f99770;
      border-radius:5px;
    }

    .todolist_table-delete-bottun{
      width:60px;
      height: 35px;
      background-color:#FFFFFF;
      border-color:#88fbe0;
      color:#88fbe0;
      border-radius:5px;
    }
  </style>
</head>
<body>
  <div class="container">
      <div class="todolist">
        <div class="todolist_headder">
          <p class="todolist_headder_title">Todo List</p>
          <div class="todolist_headder_item">
            <p>???????????????</p><!--????????????-->
            <a href="/logout" class="todolist_headder_item_logout">
              <button class="todolist_headder_item_logout_button">???????????????</button>
            </a>
          </div>
        </div>
        <a href="/find" class="todolist_find">
          <button class="todolist_find_button">???????????????</button>
        </a> 
        <form action="/create" class="todolist_task-create"  method="POST">
        @if (count($errors) > 0)
          <ul class="todolist_warning">
            @foreach ($errors->all() as $error)
              <li class="todolist_warning-title">{{$error}}</li>
            @endforeach
          </ul>
        @endif
          @csrf
            <input type="text" class="todolist_task-create-form"  name="name" >
            <button class="todolist_task-create-bottun">??????</button>
        </form>
        <table class="todolist_table">
          <tr>
            <th class="todolist_table-date">?????????</th>
            <th class="todolist_table-task">????????????</th>
            <th class="todolist_table-task">??????</th>
            <th class="todolist_table-create">??????</th>
            <th class="todolist_table-delete">??????</th>
          </tr>
            @foreach($todolist as $todolist)
              <tr>
                    <td>{{$todolist->created_at}}</td>
                  <form action="/edit" class="" method="POST">
                    @csrf
                    <td>
                      <input type="text" class="todolist_table_edit_form"  name="name" value="{{$todolist->name}}" >
                      <input type="hidden" name="id" value="{{$todolist->id}}"> 
                    </td>
                    <td>
                      <select name="tag_id" class="todolist_table-select-tag">
                        <option value="1">??????</option>
                        <option value="2">??????</option>
                        <option value="3">??????</option>
                        <option value="4">??????</option>
                        <option value="5">??????</option>
                      </select>
                    </td>
                    <td>
                      <button class="todolist_table-edit-bottun">??????</button>
                    </td>
                  </form>
                    <td>
                      <form action="/delete" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$todolist->id}}"> 
                        <button class="todolist_table-delete-bottun">??????</button>
                      </form>                    
                    </td>
              </tr>
            @endforeach  
        </table>
      </div>
  </div>
</body>
</html>