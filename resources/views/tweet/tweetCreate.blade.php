<div id="wrapper">
    <form id="paper" method="post" action="{{ route('tweets.store') }}" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <textarea placeholder="Enter something funny." id="text" name="text" rows="4"
            style="overflow: hidden; word-wrap: break-word; resize: none; height: 160px;" maxlength="250"></textarea>
        <br>
        <span id="remaning" style="color: black">250</span>
        <button id="button" type="submit">Tweet</button>
    </form>
</div>
