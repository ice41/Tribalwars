/*46db225154fe84b4c7213a7f4113e130*/
var Register={messages:null,suggestionsLinks:null,checkName:function(name){$.ajax({url:'register.php?ajax=check_name',data:{name:name},dataType:'json',type:'POST',success:function(data){if(typeof data.errors!="undefined"){Register.showNameErrors(data.errors)}else Register.hideNameErrors();if(typeof data.suggestions!="undefined"){Register.suggestionLinks=Register.createLinks(data.suggestions);Register.showSuggestions(name,4,0)}else Register.hideSuggestions()}})},showNameErrors:function(errors){var el=$("#name_error");el.empty();$.each(errors,function(key,error){if(error==="name_too_short"&&$('#name').val().length==0)return;el.append("<br />"+Register.messages[error])});el.show()},hideNameErrors:function(){$("#name_error").hide()},createLinks:function(names){var suggestionLinks=[];$.each(names,function(key,suggestedName){var link="<li><a class='evt-set-name' href='#'>"+suggestedName+"</a></li>";suggestionLinks.push(link)});return suggestionLinks},showSuggestions:function(name,amount,offset){if(offset>=Register.suggestionLinks.length)offset=offset%Register.suggestionLinks.length;var links=[];for(var j=offset;j<offset+amount;j++)links.push(Register.suggestionLinks[j]);$(".evt-get-more").remove();$("#name-suggestion-list").empty().append(links.join(""));$("#name-suggestions").append("<a href='#' class='evt-get-more'>wi�cej</a>").slideDown();$(".evt-set-name").click(function(e){Register.fillInputWith(this,$('#name'));Register.hideSuggestions();$('#name_error').hide();e.preventDefault()});$(".evt-get-more").click(function(e){Register.showSuggestions(name,amount,offset+amount);e.preventDefault()})},hideSuggestions:function(){$("#name-suggestions").slideUp()},fillInputWith:function(elValue,elInput){elInput.val(elValue.text)},checkInput:function(type,value){$.ajax({url:'register.php?ajax=check_input',data:{type:type,value:value},dataType:'json',type:'POST',success:function(data){$('#'+type+'_error').css('display','none').text('');$('#password_info').css('display','none').text('');$('#password_errors').css('display','none').text('');if(data.status=='ERROR'){$(data.message).each(function(index,item){var errorMessage=Register.messages.hasOwnProperty(item)?Register.messages[item]:item;$('#'+type+'_error').css('display','block').append(errorMessage).append($('<br />'))})}else if(data.status=='INFO'){$('#password_info').css('display','none');if($('#password_confirm_error').text().length==0&&$('#password_errors').text().length==0)$('#password_info').css('display','').text(data.message)}}})},checkInputEqual:function(type,inputConfirm){diff=(inputConfirm!=$('#'+type).val());$('#password_errors, #password_confirm_error').css('display','none');switch(type){case'password':$('#password_confirm_error').css('display','').text(diff?'Musisz wpisa� has�o dwa razy identycznie.':'');break;case'name':$('#password_errors').css('display','').text(diff?'':'Has�o nie mo�e by� takie samo jak tw�j nick!');break}},checkPasswordConfirm:function(){$('#password_error, #password_confirm_error').hide();var pw=$('#password').val(),pwRep=$('#password_repeat').val();if(pw==""){$('#password_error').text('Has�o musi zawiera� co najmniej cztery litery!').show();return false};if(pwRep==""||pw!=pwRep){$('#password_confirm_error').text('Musisz wpisa� has�o dwa razy identycznie.').show();return false};return true},checkAgb:function(){$('#agb_error').hide();var accepted=$("#accept").is(':checked');if(!accepted){$('#agb_error').text('Musisz zaakceptowa� og�lne warunki handlowe.').show();return false};return true},preSubmitCheck:function(){var noError=true;$('#name_error, #email_error, #password_error, #password_confirm_error, #agb_error').hide();if($('#username').val()==""){$('#name_error').text('Nick musi zawiera� co najmniej cztery znaki!').show();noError=false};if($('#email').val()==""){$('#email_error').text('Podany adres E-Mail jest niew�a�ciwy.').show();noError=false};if(!Register.checkAgb()||!Register.checkPasswordConfirm())noError=false;return noError},chooseWorld:function(worldValue){if(worldValue=='chooseOther')location.href='/register.php?mode=ask_server'}}