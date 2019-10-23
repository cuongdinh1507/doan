@extends("index")
@section('content')
<div class="col-lg-10 mx-auto">
    <div class="col-md-2 mt-5 d-inline-block align-top bge p-0" id="searchToggle" style="border-radius:10px">
        <div class="position-relative cp searchToggle p-2" data-toggle="collapse" data-target="#subjectTopic">
            <div class="d-inline-block font-weight-bolder">Subjects</div>
            <div class="d-inline-block text-right position-absolute mr-2" style="right:0"><i class="fas fa-angle-up"></i></div>
        </div>
        <div id="subjectTopic" class="collapse cp show pb-2 pl-2"></div>
        <div class="position-relative cp searchToggle p-2" data-toggle="collapse" data-target="#keywordTopic">
            <div class="d-inline-block font-weight-bolder">Keywords</div>
            <div class="d-inline-block text-right position-absolute mr-2" style="right:0"><i class="fas fa-angle-up"></i></div>
        </div>
        <div id="keywordTopic" class="collapse cp show pb-2 pl-2"></div>
    </div><div class="col-md-10 mt-5 d-inline-block align-top">
        <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4 col-lg-7">
            <div class="input-group">
                <input type="search" id="textSearch" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light">
                <div class="input-group-append">
                    <button id="button-addon1" type="button" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
        <div class="postTopic"></div>
    </div>
</div>
<script>
    $(function(){
        var subject = "",
            text = "",
            keywords = "",
            id = {!! $id !!};
        $("#searchToggle").on("click",".searchToggle",function(){
            $(this).find(".fa-angle-up").length == 0 ? $(this).find(".fa-angle-down").removeClass("fa-angle-down").addClass("fa-angle-up") :  $(this).find(".fa-angle-up").removeClass("fa-angle-up").addClass("fa-angle-down") ;
        });
        searchSK = (subject,keyword,text) => {
            console.log(subject,keyword,text);
            $.getJSON("{!! route('topic.searchsk') !!}", {subject: subject, keyword: keyword, text: text}, (data) => {
                createPostList(data);
            });
        }
        $.getJSON("{!! route('topic.keyword') !!}", (data)=>{
            var arr = [],
                keyword = [];
            data.map((v)=>{
                var itemArr = v.keyword == null ? [] : v.keyword.split(",");
                arr = arr.concat(itemArr);
            });
            arr.map((v)=>{
                keyword.indexOf(v.trim()) === -1 ? keyword.push(v.trim()) : console.log("element has exists");
            });
            $("#keywordTopic").append(
                keyword.map((v)=>{
                    return $("<div>", { class: "custom-control custom-radio cp w-100 my-2"}).append(
                        $("<input>", { type: "radio", class: "custom-control-input keywordInput", id: v, value: v, name: "keyword"}).on("click", ()=>{
                            keywords = v;
                            searchSK(subject,keywords,text);
                        }),
                        $("<label>", { class: "custom-control-label cp", for: v, text: v}),
                    );
                }),
            );
        });
        $.getJSON("{!! route('getSubject') !!}", (data)=>{
            $("#subjectTopic").append(
                $.map(data, (v)=>{
                    return $("<div>", { class: "custom-control custom-radio cp w-100 my-2"}).append(
                        $("<input>", { type: "radio", class: "custom-control-input subjectInput s"+v.id, id: v.nameSubject, value: v.nameSubject, name: "subject"}).on("click", ()=>{
                            subject = v.nameSubject;
                            searchSK(subject,keywords,text);
                        }),
                        $("<label>", { class: "custom-control-label cp", for: v.nameSubject, text: v.nameSubject}),
                    );
                }),
            );
        });
        createPostList = data => {
            $(".postTopic").children().remove();
            if (data.length != 0)
                $(".postTopic").append(
                    data.map((v)=>{
                        if (v.keyword != null && v.abstract != null)
                            return $("<div>", { class: "mt-5"}).append(
                                $("<h4>", { class: "mb-1"}).append(
                                    $("<a>", { href: "post/postid=" + v.id, text: v.title }),
                                ),
                                $("<div>", { class: "font-weight-bold mb-2", text: v.nameSubject }),
                                v.keyword.split(",").map((v)=>{
                                    return $("<div>", { class: "d-inline-block bge mr-1 px-3", text: v.trim() });
                                }),
                                $("<div>", { text: v.abstract.slice(0,200) + "..." }),
                                $("<div>", { class: "font-italic text-muted", text: "Last updated at: " + v.updated_at }),
                            );
                        else if (v.keyword == null && v.abstract != null)
                            return $("<div>", { class: "mt-5"}).append(
                                $("<h4>", { class: "mb-1"}).append(
                                    $("<a>", { href: "post/postid=" + v.id, text: v.title }),
                                ),
                                $("<div>", { class: "font-weight-bold mb-2", text: v.nameSubject }),
                                $("<div>", { text: v.abstract.slice(0,200) + "..." }),
                                $("<div>", { class: "font-italic text-muted", text: "Last updated at: " + v.updated_at }),
                            );
                        else if (v.keyword != null && v.abstract == null)
                            return $("<div>", { class: "mt-5"}).append(
                                $("<h4>", { class: "mb-1"}).append(
                                    $("<a>", { href: "post/postid=" + v.id, text: v.title }),
                                ),
                                $("<div>", { class: "font-weight-bold mb-2", text: v.nameSubject }),
                                v.keyword.split(",").map((v)=>{
                                    return $("<div>", { class: "d-inline-block bge mr-1 px-3", text: v.trim() });
                                }),
                                $("<div>", { class: "font-italic text-muted", text: "Last updated at: " + v.updated_at }),
                            );
                        else
                            return $("<div>", { class: "mt-5"}).append(
                                $("<h4>", { class: "mb-1"}).append(
                                    $("<a>", { href: "post/postid=" + v.id, text: v.title }),
                                ),
                                $("<div>", { class: "font-weight-bold mb-2", text: v.nameSubject }),
                                $("<div>", { class: "font-italic text-muted", text: "Last updated at: " + v.updated_at }),
                            );
                    }),
                ).hide().fadeIn(500);
            else
                $(".postTopic").append(
                    $("<h4>", { class: "col-lg-7 mx-auto text-muted", text: "No results were found! Please try again"}),
                );
        };
        $.getJSON("{!! route('topic.getPost') !!}", (data)=>{
            createPostList(data);
        }).then(()=>{
            if ( id != null)
                $(".s"+id).click();
        });
        $("#textSearch").on("keypress", (e)=>{
            if (e.which == 13){
                text = $("#textSearch").val();
                searchSK(subject,keywords,text);
            }
        });
    });
</script>
@endsection
