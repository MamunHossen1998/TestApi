$(function(){
  $("#addcustomerform").on("submit",function(e){
   e.preventDefault();
   var form = $(this);
   var url = form.attr("action");
   var type = form.attr("method");
   var data = form.serialize();

   $.ajax({
     url:url,
     data:data,
     type:type,
     dataType:"JSON",
     success: function(data){
      if(data=="success"){
        $("#addcustomer").modal("hide");
        swal("Great","successfully data insert","success");
        // form[0].reset();
        return getcustomerdata();
      }
    }
   });
  });

function getcustomerdata(){
  var url=$("#getalldata").data("url");
  $.ajax({
    url:url,
    type:"get",
    dataType:"HTML",
    success:function(response){
     $("#showalldatahere").html(response);
    }
  })
}

//view's coading start
$(document).on("click","#view",function(e){
  e.preventDefault();
  var id =$(this).data("id");
  var url =$(this).attr("href");

  $.ajax({
    url:url,
    data:{id:id},
    type: "GET",
    dataType:"JSON",
    success:function(response){
    if ($.isEmptyObject(response != null)) {
      $("#viewcustomer").modal("show");
      $("#customername").text(response.name+" s' Data");
      $(".name").text(response.name);
      $(".phone").text(response.pn_number);
      $(".email").text(response.email);
      $(".district").text(response.district);
    }
    }
  });
})
//delete's coading start
$(document).on("click","#delete",function(e){
  e.preventDefault();
  var id =$(this).data("id");
  var url =$(this).attr("href");

  $.ajax({
    url:url,
    data:{id:id},
    type: "GET",
    dataType:"JSON",
    success:function(response){
    swal("Delete","Delete successfully", "success");
    return getcustomerdata();
    }
  });
})

// Edit coading start
$(document).on("click","#edit",function(arg){
  arg.preventDefault();
  var id =$(this).data("id");
  var url =$(this).attr("href");

  $.ajax({
    url:url,
    data:{id:id},
    type: "GET",
    dataType:"JSON",
    success:function(response){
    $("#updatecustomer").modal("show");
    }
  });

});
$(document).on("click",".pagination li a",function(e){
  e.preventDefault();
  var page = $(this).attr("href");
  var pagenumber = page.split("?page=")[1];
  return getPaginatio(pagenumber);
})
function getPaginatio(pagenumber){
  var url=$("#getdatapagination").data("url") + "?page="+pagenumber;
  $.ajax({
    url:url,
    type:"GET",
    dataType:"HTML",
    success:function(response){
      $("#showalldatahere").html(response);
    }
  });
}

});
