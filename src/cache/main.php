<div class="container">
    <div class="row mt-5">
        <div class="col-10 offset-1" id="content">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">First PHP Todo page</h1>
                    <p class="lead">PHP를 처음 배워서 만들어보는 웹페이지입니다.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3" >
        <div class="col-10 offset-1 text-right">
            <button class="icon-btn list-btn" id="writeBtn"><i class="fas fa-feather-alt"></i></button>
            <button class="icon-btn list-btn" id="moreBtn"><i class="fas fa-retweet"></i></button>

            <button class="icon-btn write-btn" id="writeOKBtn"><i class="fas fa-pen-square"></i></button>
            <button class="icon-btn write-btn" id="cancelBtn"><i class="fas fa-window-close"></i></button>
        </div>
    </div>
    <!-- INSERT INTO todos(title, content,owner, date) ( SELECT title, content, owner, date FROM todos ) -->

</div>
<div id="loadingbox" class="df-center">
    <h2><i class="fas fa-spinner fa-spin"></i></h2>
</div>

<script src="/js/MainApp.js"></script>