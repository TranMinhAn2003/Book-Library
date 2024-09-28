
<div style="width:600px; margin: 0 auto">
    <div style="text-align: center">
        <h2>Xin chào {{$borrow->user->name}}</h2>
        <p>Quyển sách "{{ $borrow->book->name }}" đã được bạn mượn vào ngày {{ $borrow->borrowed_at }}.</p>
        <p>Vui lòng trả sách đúng hạn vào ngày {{ $borrow->due_date }}.</p>
    </div>
</div>
