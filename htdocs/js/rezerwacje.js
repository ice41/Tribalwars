﻿/**/
var ReservationManager={defaultComment:'Komentarz...',init:function(){$('#group_id').change(function(){if($('#group_id option:selected').attr('value')=='village_coords'){$('#search_village_text').fadeOut(200,function(){$('#search_village_coords').fadeIn(200)})}else $('#search_village_coords').fadeOut(200,function(){$('#search_village_text').fadeIn(200)})});JToggler.init('#reservations input[type="checkbox"]')},toggleSettings:function(){$('#change_settings').toggle();$('#reservation_settings').toggle();$('#edit_reservation').toggle()},toggleLoading:function(id){$('#img_load_'+id).toggle();$('#show_reservation_comment_'+id).toggle()},toggleComment:function(id){vis=$('#show_reservation_comment_'+id).data('visible');if(!vis){this.showComment(id);$('#show_reservation_comment_'+id).data('visible',true)}else{this.removeComment(id);$('#show_reservation_comment_'+id).data('visible',false)}},toggleEdit:function(id){$('#editbox_'+id).toggle();$('#comment_'+id).toggle()},showComment:function(id){rm=this;$.ajax({type:'POST',url:$('#reservation_ajax_link_load_comment').val(),dataType:'json',data:{reservation_id:id},beforeSend:function(){rm.toggleLoading(id)},success:function(response){if(!response.code)alert('an error occurred please try again later or contact the support team');rm.toggleLoading(response.id);editButton=(response.rights=='write')?$('<a>').attr('href','#').css('padding','0 5px 5px 0').append($('<img>').attr('src','graphic/rename.png')).click(function(){rm.toggleEdit(response.id);return false}):'';textarea=(response.rights=='write')?$('<div>').attr('id','editbox_'+response.id).css('display','none').append($('<textarea>').attr('cols',100).attr('rows',3).css('margin','5px').append(response.comment)).append($('<div>').attr('align','center').append($('<input>').attr('type','button').attr('value','Wyślij').click(function(){rm.editComment(response.id)})).append($('<input>').attr('type','button').attr('value','Anuluj').click(function(){rm.toggleEdit(response.id)}))):'';comdiv=$('<div>').attr('id','comment_'+response.id).css('display','none').css('margin','10px').append(response.comment.replace(/\n/g,"<br />")+' ').append(editButton);$('#reservation_'+response.id).after($('<tr>').css('display','none').append($('<td>').append(comdiv).append(textarea).attr('colspan',7)).css('display','table-row'));comdiv.slideDown()}})},editComment:function(id){rm=this;rm.toggleEdit(id);var text=$('#editbox_'+id).children('textarea').val();$.ajax({type:'POST',dataType:'json',url:$('#reservation_ajax_link_save_comment').val(),data:{reservation_id:id,comment:text},beforeSend:function(){rm.toggleLoading(id)},success:function(response){if(!response.code)alert('an error occurred please try again later or contact the support team');rm.toggleLoading(response.id);$('#editbox_'+id).children('textarea').text(response.comment);var editButton=$('<a>').attr('href','#').css('padding','0 5px 5px 0').append($('<img>').attr('src','graphic/rename.png')).click(function(){rm.toggleEdit(response.id);return false});$('#comment_'+id).empty().append(response.comment.replace(/\n/g,"<br />")+' ').append(editButton)}})},removeComment:function(id){$('#reservation_'+id).next().children('td').children('div').slideUp(400,function(){$('#comment_'+id).parents("tr").first().remove()})},checkComment:function(commentInput){if($(commentInput).val()==''){$(commentInput).val(this.defaultComment)}else if($(commentInput).val()==this.defaultComment)$(commentInput).val('')},toggleAll:function(){if(this.checked){$('form input:checkbox').removeAttr('checked');this.checked=false}else{$('form input:checkbox').attr('checked','checked');this.checked=true}}}