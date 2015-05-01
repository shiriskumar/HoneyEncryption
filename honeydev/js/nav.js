// USER SCRIPTS

$("#nav li").hover(function() { 
    $(this).find("ul").slideToggle("fast"); 
 });

$(".navigation").tinyNav({ 
  active: 'selected', 
  header: 'Navigation', 
  label: ''
});