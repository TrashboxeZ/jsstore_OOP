function appendFromCart(obj){
    $('.tCaret').append('<tr data-id='+obj.id+'><td>'+obj.title+'</td><td>'+obj.price+'</td><td>'+obj.count+'</td><td><button class="btn btn-danger removeProduct"><i class="fa fa-times" aria-hidden="true"></i></button></td></tr>');
}

$.get('db_proc/selCart.php',function(res){
    $.each(res,function(id,obj){
        appendFromCart(obj);
    });
});


//console.log($('.tCaret').attr('data-id'));

$(document).on('click','.removeProduct',function(){
    var itemId = $(this).parent().parent().attr('data-id');
    
    
    var id = {
        id:itemId,
        table: "caret"
    }
    
    if (confirm("Вы действительно хотите удалить?")) {
        var point = this;
        $.post('db_proc/deleteproduct.php', id, function (res) {
            if (res.status == "delete") {
                $(point).parent().parent().remove();
            }
        });
    }
    
});