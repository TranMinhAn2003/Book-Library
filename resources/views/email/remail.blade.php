
<div style="width:600px; margin: 0 auto">
    <div style="text-align: center">
        <h2>Xin chào {{$borrow->user->name}}</h2>
        <p>Quyển sách "{{ $borrow->book->name }}" của bạn sắp đến hạn trả vào ngày {{ $borrow->due_date }}.</p>
        <p>Vui lòng trả sách đúng hạn để tránh phí trễ hạn.</p>
    </div>
</div>
