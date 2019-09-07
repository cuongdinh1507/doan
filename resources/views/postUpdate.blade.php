@extends("index")
@section('content')
<div id="dataPP" value="{{$data}}" style="display:none"></div>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" titleid="0" userid="0"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="deleteUser()" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<form action="postUpdate" method="POST">
  @csrf
  <div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">PROJECT DESCRIPTION</div>

                <div class="card-body">
                  <input id="titleid" type="titleid" class="form-control @error('titleid') is-invalid @enderror" name="titleid" style="display:none" value="{{$id}}">
                  <div class="form-group row">
                      <label for="abstract" class="col-md-4 col-form-label text-md-right">Abstract</label>

                      <div class="col-md-6">
                          {{-- <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus> --}}
                          <textarea id="abstract" type="abstract" class="form-control @error('abstract') is-invalid @enderror" name="abstract" value="{{ old('abstract') }}" required autocomplete="abstract" autofocus cols="30" rows="10"></textarea>
                          @error('title')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="keyword" class="col-md-4 col-form-label text-md-right">Keyword</label>

                      <div class="col-md-6">
                          <input id="keyword" type="keyword" class="form-control @error('keyword') is-invalid @enderror" name="keyword" required autocomplete="keyword">

                          @error('keyword')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>


                  <div class="form-group row">
                      <label for="funding" class="col-md-4 col-form-label text-md-right">Funding</label>

                      <div class="col-md-6">
                          <input id="funding" type="funding" class="form-control @error('funding') is-invalid @enderror" name="funding" required autocomplete="funding">

                          @error('funding')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="start" class="col-md-4 col-form-label text-md-right">Year start</label>

                      <div class="col-md-6 date">
                          <input id="start" type="start" class="ys form-control @error('start') is-invalid @enderror" name="start" required autocomplete="start">

                          @error('start')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="end" class="col-md-4 col-form-label text-md-right">Year end</label>

                      <div class="col-md-6 date">
                          <input id="end" type="end" class="ys form-control @error('end') is-invalid @enderror" name="end" required autocomplete="end">
                          @error('end')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="publication" class="col-md-4 col-form-label text-md-right">Publications</label>

                      <div class="col-md-6">
                          <input id="publication" type="publication" class="form-control @error('publication') is-invalid @enderror" name="publication" required autocomplete="publication">

                          @error('publication')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
                </div>
                <div class="col-md-8 mx-auto text-center mb-4">
                    <button type="submit" class="btn btn-primary">{{$button}}</button>
                </div>
            </div>
        </div>
  </div>
</div>

</form>
<div class="container">
  <div class="row justify-content-center mt-5">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header text-center">PROJECT PERSONNEL</div>

              <div class="card-body">
                <table class="table table-bordered">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Email</th>
                      <th scope="col">Name</th>
                      <th scope="col">Role in project</th>
                      <th scope="col">Institution</th>
                      <th scope="col">Phone</th>
                      <th scope="col" class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody id="tbody-pp">
                  </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>
</div>
<script>
  $(function(){
    var dataPP = $.parseJSON($("#dataPP").attr("value")),
        dataPPall = {!! $datapp !!},
        check = null;
    $(".ys").datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });
    createTablePP = function(data){
      var dataPPemail = [],
          dataPP = [];
      $.get("{!! route('post.getAll',['id'=>$id]) !!}", function(all){
        $.map(all,function(v){
          dataPPemail.push({"value": v.email ,"userid":v.id});
          dataPP.push(v);
        });
      });
      console.log(dataPPemail);
      if (data && data.length){
        console.log(data);
        $("#tbody-pp").append(
          $.map(data, function(v,i){
            return $("<tr>").append(
              $("<th>", { scope: "row"}).append(
                $("<input>", { id: "input-name", class: "w-100", disabled: "disabled", value: v.email }).css({"border":"0", "outline":"none"}).autocomplete({
                  source: dataPPemail
                }).on("autocompleteclose", function(){
                  var email = $(this).val();
                  $.grep(dataPPemail, function(n,i){
                      if (n.value == email)
                        check = i;
                  },true);
                  if ( check != null ){
                    var textChange = $(this).parents().eq(1).children();
                    console.log(textChange.eq(1),check,dataPP);
                    textChange.eq(1).text(dataPP[check].name);
                    textChange.eq(3).text(dataPP[check].institution);
                    textChange.eq(4).text(dataPP[check].phone);
                  }
                }).focus(),
              ).css({"width":"25%","outline":"none"}),  
              $("<td>", { scope: "row", text: v.name }),
              $("<td>", { scope: "row" }).append(
                $("<div>", { class:"input-group", placeholder: "Choose role" }).append(
                  $("<select>", { type: "role", name: "role", disabled: "disabled" , class:"disabled-up"+v.id}).append(
                    $("<option>", { value: "Researcher", text: "Researcher" }).attr(v.role == "Researcher" ? "selected":"vl", "selected"),
                    $("<option>", { value: "Project leader", text: "Project leader" }).attr(v.role == "Project leader" ? "selected":"vl", "selected"),
                  ).css({
                    "border":"0",
                    "outline":"none"
                  }),
                ),
              ).css({"width": "15%"}),
              $("<td>", { scope: "row", text: v.institution }),
              $("<td>", { scope: "row", text: v.phone }),
              $("<td>", { scope: "row", class:"text-center" }).append(
                $("<div>", { class:"btn btn-success cp pt-1 pb-1 pr-3 pl-3 mr-2 align-middle d-none check"+v.id}).append(
                    $("<i>", { class: "fas fa-check" }),
                ).on("click", function(){
                  $.get("{!! route('post.updateUser', ['id'=>$id]) !!}", { userid: v.user_id, role: $("select[class='disabled-up"+v.id+"']").val() }, function(c){
                    $("#tbody-pp").children().fadeOut().remove();
                    createTablePP(c);
                  });
                }),
                $("<div>", { class:"btn btn-success d-inline-block cp pt-1 pb-1 pr-3 pl-3 mr-2 align-middle iedit"+v.id}).append(
                    $("<i>", { class: "far fa-edit" }),
                ).on("click", function(){
                  $(".disabled-up"+v.id).attr("disabled", false);
                  $(".check"+v.id+",.iclose"+v.id).removeClass('d-none').addClass('d-inline-block');
                  $(this).addClass('d-none').removeClass('d-inline-block');
                  $(".idelete"+v.id).addClass('d-none').removeClass('d-inline-block');
                }),
                $("<div>", { class:"btn btn-danger d-inline-block cp pt-1 pb-1 pr-3 pl-3 align-middle idelete"+v.id, "data-toggle": "modal", "data-target": "#modal"}).append(
                    $("<i>", { class: "far fa-trash-alt" }),
                ).on("click",function(){
                  $(".modal-body").text("Delete " + v.email + " from this project ?").attr("titleid", v.title_id).attr("userid", v.user_id);
                }),
                $("<div>", { class:"btn btn-danger cp pt-1 pb-1 pr-3 pl-3 mr-2 align-middle d-none iclose"+v.id}).append(
                    $("<i>", { class: "fas fa-times" }),
                ).on("click", function(){
                  console.log("hi")
                  $(".disabled-up"+v.id).attr("disabled", true);
                  $(".check"+v.id).addClass('d-none').removeClass('d-inline-block');
                  $(this).addClass('d-none').removeClass('d-inline-block');
                  $(".idelete"+v.id+",.iedit"+v.id).removeClass('d-none').addClass('d-inline-block');
                }),
              ),         
            );
          }),
        ).fadeIn();
      }
      $("#tbody-pp").append(
        $("<tr>").append(
          $("<th>", { scope: "row"}).append(
            $("<input>", { id: "input-name", class: "w-100", name: "email" }).css({"border":"0", "outline":"none"}).autocomplete({
              source: dataPPemail
            }).on("autocompleteclose", function(){
              var email = $(this).val();
              $.grep(dataPPemail, function(n,i){
                  if (n.value == email)
                    check = i;
              },true);
              if ( check != null ){
                var textChange = $(this).parents().eq(1).children();
                console.log(dataPP[check])
                textChange.eq(1).text(dataPP[check].name);
                textChange.eq(3).text(dataPP[check].institution);
                textChange.eq(4).text(dataPP[check].phone);
              }
            }).focus(),
          ).css({"width":"25%","outline":"none"}),
          $("<td>", { scope: "row" }),
          $("<td>", { scope: "row" }).append(
            $("<div>", { class:"input-group", placeholder: "Choose role" }).append(
              $("<select>", { type: "role", name: "role" }).append(
                $("<option>", { value: "Researcher", text: "Researcher", selected: "selected" }),
                $("<option>", { value: "Project leader", text: "Project leader" }),
              ).css({
                "border":"0",
                "outline":"none"
              }),
            ),
          ).css({"width": "15%"}),
          $("<td>", { scope: "row" }),
          $("<td>", { scope: "row" }),
          $("<td>", { scope: "row", class:"text-center" }).append(
            $("<div>", { class:"btn btn-success d-inline-block cp pt-1 pb-1 pr-3 pl-3 align-middle"}).append(
                $("<i>", { class: "far fa-save" }),
            ).on("click", function(){
              var curEmail = $(this).parents().eq(1).children(":first").children(":first").val();
              var checkCurEmail = $.grep(dataPPemail, function(n,i){
                return n.value == curEmail;
              });
              console.log(curEmail,checkCurEmail)
              if (checkCurEmail[0].value == curEmail ){
                var newRole = $(this).parents().eq(1).children().eq(2).children(":first").children(":first").val();
                $.get("{!! route('post.save',['id'=>$id]) !!}", { userid: checkCurEmail[0].userid, role: newRole } , function(newData){
                  console.log(newData);
                  $("#tbody-pp").children().fadeOut().remove();
                  createTablePP(newData);
                });
                // $.get("", function(cc){
                //   console.log(cc);
                // })
              }
            }),
          ),
        ),
      ).fadeIn();
    };
    deleteUser = function(){
      var titleid = $(".modal-body").attr("titleid"),
          userid = $(".modal-body").attr("userid");
      $.get("{!! route('post.DelUser',['id'=>$id]) !!}", { userid: userid }, function(data){
        $("#tbody-pp").children().fadeOut().remove();
        createTablePP(data);
      });
    };
    createTablePP(dataPPall);
  });
</script>
@endsection
