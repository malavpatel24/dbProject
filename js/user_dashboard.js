
$(document).ready(function() {

  $('.plus').on('click', function(){
    $this = $(this)
    id = $this.data('id')
    user_ranked = $this.siblings(".ranking").data("calc")

    if(user_ranked != "1") //If not already incremented, increment
    {
      $this.siblings(".ranking").data("calc", "1")
      $this.css("color", "green");
      current_value = $this.siblings(".ranking").text();
      $this.siblings(".minus").css("color", "black");

      if(user_ranked == "-1") //User already voted. Add 2 to offset their -1.
      {
        $this.siblings(".ranking").text( parseInt(current_value) + 2)
      }
      else
      {
        $this.siblings(".ranking").text( parseInt(current_value) + 1)
      }
    }
  })

  $('.minus').on('click', function(){
    $this = $(this)
    id = $this.data('id')
    user_ranked = $this.siblings(".ranking").data("calc")

    if(user_ranked != "-1") //If not already decremented, decrement
    {
      $this.siblings(".ranking").data("calc", "-1")
      $this.css("color", "red");

      current_value = $this.siblings(".ranking").text();
      $this.siblings(".plus").css("color", "black");

      if(user_ranked == "1") //User already voted. Minus 2 to offset their +1.
      {
        $this.siblings(".ranking").text( current_value - 2)
      }
      else
      {
        $this.siblings(".ranking").text( current_value - 1)
      }
    }
  })
});


$.ajax(this.href, {
  success: function(data) {
  },
  error: function() {
     $('#notification-bar').text('An error occurred');
  }
});
