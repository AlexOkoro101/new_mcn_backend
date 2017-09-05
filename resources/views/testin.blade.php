<!DOCTYPE html>
<html>
<head>
  <title>sweet</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style>
    body {
  font-family: Arial, Helvetica, sans-serif;
}

#accordion { 
  width: 100%; 
  }

.title p { 
  background-color: #F60;
  border-bottom: 1px solid #FFFFFF;
  cursor: pointer;
  padding: 10px;
  color: #FFFFFF;
  }
  
.hide {
  background-color: green;
  display: none;
  padding: 10px;
  }

  </style>
</head>
<body>
<div id="accordion">

<div class="title"><p>Accordian 1</p></div>
<div class="hide">

  <p>hidden content</p>

</div>

<div class="title"><p>Accordian 2</p></div>
<div class="hide">

  <p>hidden content</p>

</div>


<div class="title"><p>Accordian 3</p></div>
<div class="hide">

   <p>hidden content</p>

</div>

<div class="title"><p>Accordian 4</p></div>
<div class="hide">

   <p>hidden content</p>

</div>

<div class="title"><p>Accordian 5</p></div>
<div class="hide">

   <p>hidden content</p>

</div>

<div class="title"><p>Accordian 6</p></div>
<div class="hide">

   <p>hidden content</p>

</div>

<div class="title"><p>Accordian 7</p></div>
<div class="hide">

   <p>hidden content</p>

</div>

<div class="title"><p>Accordian 8</p></div>
<div class="hide">

   <p>hidden content</p>

</div>

<div class="title"><p>Accordian 9</p></div>
<div class="hide">

   <p>hidden content</p>

</div>


</div>
<script>
  $(document).ready(function() {    
   $('#accordion .hide').hide();
   $('#accordion .title p').click(function(){
           $(this).parent().next().slideToggle()
                  .siblings('.hide').slideUp();
           return false;
   });
    $('.close').click(function(){
        $('#accordion .hide').slideUp();
    });
});
</script>
</body>
</html>