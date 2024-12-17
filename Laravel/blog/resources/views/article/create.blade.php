<form action="{{ route('baiviet.store') }}" method="post">
    @csrf
    <div>
        <label for="title">Tieu de:</label>
        <input type="text" name="title" id="">
        <div>
            @error('title')
                <span class="invald-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div>
        <label for="content">Noi dung:</label>
        <textarea name="content" id="" cols="25" rows="8"></textarea>
        <div>
            @error('content')
                <span class="invald-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div>
        <button type="submit">dang bai</button>
    </div>
</form>