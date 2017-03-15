@if($item != null)
<table class="table table-hover">
    <thead>
    <tr>
        <th>Code</th>
        <th>Name</th>
        <th>Status</th>
        <th>Attach</th>
        <th>Time</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $item->code }}</td>
            <td>{{ $item->type }} - {{ str_limit($item->description, 80) }}</td>
            <td>
                @if($item->status == 0)
                    <span class="text-danger">Chưa xử lý</span>
                @elseif($item->status == 1)
                    <span class="text-primary">Đang xử lý</span>
                @else
                    <span class="text-success">Đã xử lý</span>
                @endif
            </td>
            <td><a target="_new" href="{{ asset('/uploads/'.$item->attach) }}">Đính kèm</a></td>
            <td>{{ $item->created_at }}</td>
        </tr>
    </tbody>
</table>
@else
    <h3>Không tìm thấy yêu cầu nào</h3>
@endif
