<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TodoList</title>
</head>
<style>

</style>

<body>
    <div class="container">
        <div class="todo-title">Todo List</div>
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        @endif
        <form action="/todo/create" method="post">
            @csrf
            <input type="text" name="content">
            <button>追加</button>
        </form>
        <table>
            <tr>
                <td>作成日</td>
                <td>タスク名</td>
                <td>更新</td>
                <td>削除</td>
            </tr>
            @foreach ($items as $item)
                <tr>
                    <td>
                        {{ $item->updated_at }}
                    </td>
                    <form action="{{ route('todo.update', ['id' => $item->id]) }}" method="post">
                        @csrf
                        <td>
                            <input type="text" class="input-update" value="{{ $item->content }}" name="content" />
                        </td>
                        <td>
                            <button>更新</button>
                        </td>
                    </form>
                    <td>
                        <form action="{{ route('todo.delete', ['id' => $item->id]) }}" method="post">
                            @csrf
                            <button>削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tr>
        </table>
    </div>
</body>

</html>
