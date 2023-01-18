<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="discription" content="text text text text text text text text text text ">
  <link rel="stylesheet" href="./html5reset.css"><!--リセットCSS-->
  <title>COACHTECH</title>
</head>
<style>
body{
  background-color:#2D197C;
  font-size:20px;
}

.container{
  width:100%;
  height:700px;
  display:flex;
  justify-content:center;
  align-items:center;
}

.card{
  width:60%;
  background-color:#ffffff;
  padding:20px;
  border-radius:20px;
}

h2{
  font-size:30px;
  margin-top:0px;
}

li{
  margin-left:-30px;
  margin-bottom:0;
  padding-bottom:0;
}

.create{
  width:100%;
  margin-top:-25px;
  padding-top:0;
}

.create_form{
  width:80%;
  height:40px;
  border-color:#E6E6E6;
  border-radius:10px;
  margin-right:10%;
}

.create_form_button{
  width:6%;
  height:45px;
  margin:0px 0px 0px auto;
  background-color:#ffffff;
  color:#DC70FD;
  border-color:#DC70FD;
  border-radius:10px;
}

.table{
  width:90%;
  margin:20px 20px 20PX auto;
  text-align:center;
}

.table_th1{
  width:30%;
}
.table_th2{
  width:40%;
}
.table_th3{}
.table_th4{}

.table_td1{
  width:30%;
}
.table_td2{
  width:40%;
  border-radius:10px;
}
.table_td2_edit{
  width:100%;
  border-radius:10px;
}
.table_td2_edit_form{
  width:100%;
  border-radius:10px;
  border-color:#E6E6E6;
  height:45px;
}
.table_td3{
  width:20%;
}
.table_td3_edit_form_button{
  width:40%;
  height:45px;
  color:#FA9770;
  background-color:#FFFFFF;
  border-radius:10px;
  border-color:#FA9770;

}
.table_td4{
  width:80%;
}
.table_td4_delete_form_button{
  width:80%;
  height:45px;
  color:#71FADC;
  background-color:#FFFFFF;
  border-radius:10px;
  border-color:#71FADC;
}

</style>

<body>
  <div class="container">
    <div class="card">
      <h2>Todo List</h2>
      @if(count($errors)>0)
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      @endif
      <form action="/create" method="post" class="create">
        @csrf
        <input type="text" name="name" class="create_form">
        <button class="create_form_button">追加</button>  
      </form>
      <table class="table">
        <tr>
          <th class="table_th1">作成日</th>
          <th class="table_th2">タスク名</th>
          <th class="table_th3">更新</th>
          <th class="table_th4">削除</th>
        </tr>
        @foreach($practices as $practices)
          <tr>
            <td class="table_td1">{{$practices->created_at}}</td><!--変数を入れるで繰り返しを行う-->
            <td class="table_td2">
              <form action="/edit" method="post" class="table_td2_edit">
                @csrf
                <input type="text" name="name" value="{{$practices->name}}" class="table_td2_edit_form">
                <input type="hidden" name="id" value="{{$practices->id}}"><!--バリューの中身の変数は後程-->
                <td class="table_td3"><button class="table_td3_edit_form_button">更新</button></td>
              </form>
            </td>
            <td class="table_td4">
              <form action="delete" method="post" class="table_td4_delete">
                @csrf
                <input type="hidden" name="id" value="{{$practices->id}}"><!--バリューの中身の変数は後程-->
                <button class="table_td4_delete_form_button">削除</button>              
              </form>
            </td>
          </tr>
        @endforeach
      </table>
      
    </div>
  </div>

</body>
</html>