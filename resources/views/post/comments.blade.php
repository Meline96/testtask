<div class="list-group-comment mb-3 mt-3">
    <label for="replyFormComment">Comments</label>
    @foreach($comments as $comment)
        <div class="d-flex justify-content-center py-2">
            <div class="second py-2 px-2"> <span class="text1">{{ $comment->body }}</span>
                <div class="d-flex justify-content-between py-1 pt-2">
                    <div><span class="text2">{{ $comment->user->name }}</span></div>
                </div>
            </div>
        </div>
    @endforeach
</div>
