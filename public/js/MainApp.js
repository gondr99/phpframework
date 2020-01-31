class MainApp {
    constructor() {
        this.moreBtn = document.querySelector("#moreBtn");
        this.moreBtn.addEventListener("click", ()=>{
            this.getDataFromServer(this.currentIdx);
        });

        document.addEventListener("click", (e)=>{
            if(e.target.classList.contains("del")){
                let id = e.target.dataset.id;
                this.deleteItem(id, e.target.parentNode.parentNode);
            }
        });

        this.loadingWindow = $("#loadingbox");
        $("#writeBtn").on("click", (e)=>{
            this.makeWritePage();
        });

        $("#cancelBtn").on("click", (e)=>{
           this.closeWritePage();
        });

        $("#writeOKBtn").on("click", (e)=>{
            this.writeProcess();
        });

        this.currentIdx = 0;
        this.grid = null;
        this.getDataFromServer(this.currentIdx);
    }

    openLoading(){
        return new Promise( (res, rej) => {
            this.loadingWindow.addClass("active");
            setTimeout(()=>{
                res();
            }, 1000);
        });
    }

    closeLoading(){
        return new Promise( (res, rej) => {
            this.loadingWindow.removeClass("active");
            setTimeout(()=>{
                res();
            }, 1000);
        });
    }

    deleteItem(id, target){
        //  /todo/del/${id}
        $.ajax({
            url: `/todo/del/${id}`,
            method: 'get',
            success: (data) => {
                if(data.success){
                    //부드럽게 사라지게
                    target.classList.remove("active");
                    setTimeout(()=>{
                        target.remove();
                    }, 500);
                }else {
                    //1번숙제 : 읽기 팝업창 만들기 - 디자인도
                    //2번 숙제 :
                    alert(data.msg);  //토스트 메시지 만들기가 오늘의 숙제
                }
            }
        });
    }

    getDataFromServer(idx){
        return new Promise( (res, rej) => {
            $.ajax({
                url: `/todo/getList/${idx}`,
                method: 'get',
                success: (data) => {
                    if(data.success){
                        this.makeTemplate(data.list);
                        this.currentIdx += data.list.length;
                        $(".list-btn").css({display:'inline-block'});
                        $(".write-btn").css({display:'none'});
                    }else {
                        $(".icon-btn").css({display:'none'});
                    }
                    res();
                }
            });
        });

    }
    checkScroll() {
        if(window.innerHeight + window.scrollY <= document.body.clientHeight){
            window.scrollTo(0, document.body.clientHeight - window.innerHeight);
        }
    }

    makeTemplate(list){
        const content = document.querySelector("#content");
        if(this.currentIdx == 0){
            content.innerHTML = "";
            this.grid = document.createElement("div");
            this.grid.id = "gridContainer";
        }

        list.forEach((item, idx) => {
            setTimeout(()=>{
                let dom = this.makeItem(item);
                this.grid.appendChild(dom);
                setTimeout(()=>{
                    dom.classList.add("active");
                    this.checkScroll();
                }, 10);
            }, Math.floor(idx / 3)  * 500);
        });
        content.appendChild(this.grid);
    }



    makeItem(item){
        let dom = document.createElement("div");
        dom.classList.add("todobox");
        dom.innerHTML = `
                <div class="header-box">
                    <div class="trans-box head"></div>
                    <p>${ item.title }</p>
                    <div class="trans-box tail"></div>
                </div>
                <div class="info-box">
                    <div class="time">
                        <div class="icon-box"><i class="far fa-clock"></i></div>
                        <div class="text-box">${item.date}</div>
                    </div>
                </div>
                <div class="button-row">
                    <button class="btn btn-primary btn-sm mod" data-id="${item.id}">수정</button>
                    <button class="btn btn-danger btn-sm del" data-id="${item.id}">삭제</button>
                </div>`;
        return dom;
    }

    async makeWritePage(){
        await this.openLoading();
        this.currentIdx = 0;
        let template = `
            <form id="todoForm">
                <div class="form-group">
                    <label for="title">할일</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="할 일을 입력하세요">
                </div>
                <div class="form-row">
                    <div class="col-5">
                        <label for="date">날짜</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="col-5 offset-2">
                        <label for="time">시간</label>
                        <input type="time" class="form-control" id="time" name="time">
                    </div>
                </div>
                <div class="form-group">
                    <label for="content">상세 내용</label>
                    <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                </div>
            </form>`;
        $("#content").html(template);
        $(".list-btn").css({display:'none'});
        $(".write-btn").css({display:'inline-block'});
        await this.closeLoading();
    }

    async closeWritePage(){
        await this.openLoading();
        await this.getDataFromServer(this.currentIdx);
        await this.closeLoading();
    }

    writeProcess(){
        let form = $("#todoForm").serialize();
        $.ajax({
            url:'/todo/write',
            method:'post',
            data:form,
            success:(data)=>{
                alert(data.msg);  //너네는 이부분이 토스트 메시지여야해
                if(data.success){
                    this.closeWritePage();
                }
            }
        });
    }
}

window.addEventListener("load", () => {
    let mainApp = new MainApp();
});