
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

      increment_ajax(id)
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

      decrement_ajax(id)
    }
  })

  $('.date').on('change', function(){
    $this = $(this)
    id = $this.data('id')
    value = $this.val()
    alert(value)
    if(value != "")
    {
      $this.siblings(".visited").addClass('glyphicon glyphicon-ok')
      save_date(id, value)
    }
    else
    {
      $this.siblings(".visited").removeClass('glyphicon glyphicon-ok')
      remove_date(id)
    }

  })
});


function increment_ajax(location_id)
{
    $.ajax({
    url: BASE_URL + "/increment_rank",
    cache: false,
    data: {"id": location_id},
    success: function(){
    },
    error: function() {
    }
  });
}

function save_date(location_id, date)
{
    $.ajax({
    url: BASE_URL + "/save_date",
    cache: false,
    data: {"id": location_id, "date": date},
    success: function(){
    },
    error: function() {
    }
  });
}

function remove_date(location_id)
{
    $.ajax({
    url: BASE_URL + "/remove_date",
    cache: false,
    data: {"id": location_id},
    success: function(){
    },
    error: function() {
    }
  });
}

function decrement_ajax(location_id)
{
    $.ajax({
    url: BASE_URL + "/decrement_rank",
    cache: false,
    data: {"id": location_id},
    success: function(){
    },
    error: function() {
    }
  });
}
