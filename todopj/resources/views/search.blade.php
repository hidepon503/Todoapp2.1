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

    .todolist_return_button{
      width:60px;
      height: 35px;
      background-color:#FFFFFF;
      border-color: #f99770;;
      color:#f99770;
      border-radius:5px;
    }

  </style>
</head>
<body>
  <div class="container">
      <div class="タスク検索">
        <div class="todolist_headder">
          <p class="todolist_headder_title">Todo List</p>
          <div class="todolist_headder_item">
            <p>ログイン中</p><!--仮の文章-->
            <a href="/logout" class="todolist_headder_item_logout">
              <button class="todolist_headder_item_logout_button">ログアウト</button>
            </a>
          </div>
        </div>
        
        <form action="/create" class="todolist_task-create"  method="POST">     
          @csrf
          <input type="text" class="todolist_task-create-form"  name="name" >
          <button class="todolist_task-create-bottun">追加</button>
        </form>
        <table class="todolist_table">
          <tr>
            <th class="todolist_table-date">作成日</th>
            <th class="todolist_table-task">タスク名</th>
            <th class="todolist_table-task">タグ</th>
            <th class="todolist_table-create">更新</th>
            <th class="todolist_table-delete">削除</th>
          </tr>
            @foreach($todolists as $todolist)
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
                        <option value="1">家事</option>
                        <option value="2">勉強</option>
                        <option value="3">運動</option>
                        <option value="4">食事</option>
                        <option value="5">異動</option>
                      </select>
                    </td>
                    <td>
                      <button class="todolist_table-edit-bottun">更新</button>
                    </td>
                  </form>
                    <td>
                      <form action="/delete" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$todolist->id}}"> 
                        <button class="todolist_table-delete-bottun">削除</button>
                      </form>                    
                    </td>
              </tr>
            @endforeach  
        </table>
        <a href="/" class="todolis_return">
          <button class="todolist_return_button">戻る</button>
        </a> 
      </div>
  </div>
</body>
</html>