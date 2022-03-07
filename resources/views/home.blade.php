<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo lista</title>

    <link href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href= "https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
    <script type ="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
</head>
<body class="bg-info">
    <div class="container w-26 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3>Todo Lista</h3>
                <form action="{{ route('store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="content" class="form-control" placeholder="Unesite novi zadatak">
                        <button type="submit" class="btn btn-dark btn-sm px-4"><i class="fas fa-plus"></i></button>
                    </div>
                </form> 
                 @if  (count ($todolist))
                 <ul class = "list-group-flush mt-3" >
                      @foreach ($todolist as $todolist )
                            <li class = "list-group-item">
                                <form action="{{ route('destroy' , $todolist->id) }}" method="POST">
                                    {{ $todolist->content }}
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-link btn-sm float-end"><i class="fas fa-trash"></i></button>
                                </form>    
                            </li>
                      @endforeach   
                </ul>
                @else
                <p class="text-center mt-3">Nema zadataka...</p> 
                @endif
            </div>
        </div>
    </div>            
</body>
</html>