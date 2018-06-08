$(document).ready(function(){

	$(".account").click(function(){
		$(".user-corner").slideToggle();
		$(".nav-menu").slideToggle(200);
	});

  $(".mobile-icon").click(function(){
    $(".mobile-corner").slideToggle();
    $(".mobile-menu").slideToggle(200);
  });

	$(".content,.footer,.pd30,.pd20").click(function(){
		$(".user-corner").hide();
		$(".nav-menu").hide(200);
    $(".mobile-corner").hide();
    $(".mobile-menu").hide(200);
	});


  $("#footer-button").click(function(){
      var email = $("#footer-email").val();
      var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

      if(email != ""){
        if(pattern.test(email)){
          $.post("/add-email",{email:email},function(data){
            $("#email-message").css({'color' : '#569b44'});
            $('#email-message').html('Ваш Email успешно добавлен!');
            $("#footer-email").val("");
          });
        }
        else{
          $("#email-message").css({'color' : '#ff0000'});
          $('#email-message').html('Неверный формат');
        } 
      }
      else{
          $("#email-message").css({'color' : '#ff0000'});
          $('#email-message').html('Поле Email не должно быть пустым!');
      }
  });

});

document.addEventListener("DOMContentLoaded", function(){
  var scrollbar = document.body.clientWidth - window.innerWidth + 'px';
  console.log(scrollbar);
  document.querySelector('[href="#modal"]').addEventListener('click',function(){
    document.body.style.overflow = 'hidden';
    document.querySelector('#modal').style.marginLeft = scrollbar;
  });
  document.querySelector('[href="#close"]').addEventListener('click',function(){
    document.body.style.overflow = 'visible';
    document.querySelector('#modal').style.marginLeft = '0px';
  });
});