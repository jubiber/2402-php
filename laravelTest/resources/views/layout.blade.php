<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>layout</title>
</head>
<body>
   <h3>foreach문 data1</h3>
    @forelse($data as $key => $val)
    <p>
    {{'남은 루프 횟수 >> '.$loop->remaining}}
    <span>{{$key.' : '.$val}}</span>
    <br>
    @empty
    <p>{{'남은 루프 횟수 >> '.$loop->remaining}}</p>
    <span>{{$key.' : '.$val}}</span>
    <br>
    @endforelse
    <p>data1 배열이 비어있습니다.</p>
    {{-- @endforelse
    <h3>forelse문 data2</h3>
    @forelase($data2 as $key => $val)
        <p>{{'남은 루프 횟수 >> '.$loop->remaining}}</p>
        <span>{{$key." : ".$val}}</span>
    @empty
        <p>data2 배열이 비어있습니다.</p>
    @endforelse --}}
</body>
</html>