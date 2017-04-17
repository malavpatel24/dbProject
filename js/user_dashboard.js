
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

  $('.up').on('click', function(){
    $this = $(this)
    $tr = $this.parent().parent() //The tr of this location
    $above = $tr.prev() //The tr of the location above
    swap_locations($above, $tr)

    id = $this.data('id')
  })

  $('.down').on('click', function(){
    $this = $(this)
    $tr = $this.parent().parent() //The tr of this location
    $below = $tr.next() //The tr of the location above
    swap_locations($tr, $below)

    id = $this.data('id')
  })

  $('.add').on('click', function(){
    $this = $(this)
    location_id = $this.data('id')
    $this.replaceWith("<span class='glyphicon glyphicon-ok' style='color:green;'></span>")

    add_location_to_dash(location_id)
  })

  $('.delete').on('click', function(){
    $this = $(this)
    location_id = $this.data('id')
    $tr = $this.parent().parent() //The tr of this location

    //Swap until its on bottom
    $next = $tr.next()
    while(typeof $next.html() !== "undefined")
    {
      swap_locations($tr, $next)
      $next = $next.next()
    }

    $tr.remove()

    remove_location_from_dash(location_id)
  })
});

function add_location_to_dash(location_id)
{
  $.ajax({
    url: BASE_URL + "/add_location",
    cache: false,
    data: {"id": location_id},
    success: function(){
    },
    error: function() {
    }
  });
}

function remove_location_from_dash($id)
{
  $.ajax({
    url: BASE_URL + "/remove_location",
    cache: false,
    data: {"id": location_id},
    success: function(){
    },
    error: function() {
    }
  });
}

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

function swap_locations($above, $below)
{
  above_order = $above.find(".order").text()
  below_order = $below.find(".order").text()

  //Change text
  if(above_order != "" && below_order != "" )
  {
    $below.find(".order").text(above_order)
    $above.find(".order").text(below_order)
  }

  //Swap them
  //Note that if above or below is empty object, no action is taking by function
  $above.insertAfter($below)

  above_id = $above.data('id')
  below_id = $below.data('id')

  if(above_id != "" && below_id != "" )
  {
    $.ajax({
      url: BASE_URL + "/swap_order",
      cache: false,
      data: {"above_id": above_id, "below_id": below_id },
      success: function(){
      },
      error: function() {
      }
    });
  }
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
